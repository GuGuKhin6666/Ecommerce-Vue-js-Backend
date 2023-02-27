<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderList;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //Cart data
    public function cartdata(){
        $data = Cart::get();
        return response()->json([
            'data' => $data,
        ]);
    }

    //search category
    public function searchcategory(Request $request){
      $data = Cart::where('category',$request->key)->get();
      return response()->json([
        'data' => $data,
      ]);
    }

    //search key
    public function searchkeycart(Request $request){
       $data = Cart::orwhere('title','LIKE','%'.$request->key.'%')
                   ->orwhere('description','LIKE','%'.$request->key.'%')
                   ->get();
      return response()->json([
        'data' => $data,
      ]);
    }

    //detail data
    public function detaildata(Request $request){
        $data = Cart::select('*','categories.title as categorytitle','carts.description as cartdescription','availabilities.id as statusid','carts.id as cartid')
        ->join('brands','brands.id','carts.brand')
        ->join('availabilities','availabilities.id','carts.availability')
        ->join('categories','categories.category_id','carts.category')
        ->where('carts.id',$request->key)->get();
        return response()->json([
            'data' => $data,
        ]);
    }

    //shopcard
    public function shopcart(Request $request){
      $data = Cart::where('id',$request->keyid)->get();
      
      $dataname = $data[0]['description'];
      $quantity = $request->quantity;
      $price = $data[0]['price'];

      $createdata = [
        'productname' => $dataname,
        'quantity'    => $quantity,
        'price'       => $price
      ];

      OrderList::create($createdata);


      $items = OrderList::get();
      return response()->json([
        'data' => $items
      ]);
      
    }

    //del 
    public function delid(Request $request){
      OrderList::where('id',$request->id)->delete();
      $items = OrderList::get();
      return response()->json([
        'data' => $items,
        'deletestatus' => 'success',
      ]);
    }
}