<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HotItem;
use Illuminate\Http\Request;

class HotItemController extends Controller
{
    //sent hotdata data to vue js
    public function hotdata(){
        $data = HotItem::get();
        return response()->json([
            'data' => $data,
        ]);
    }

    //Check Condition
    public function checkcondition(Request $request){
       if($request->key == 1){
        $data = HotItem::orderBy('description','asc')->get();
        return response()->json([
            'data' => $data,
        ]);
       }else if($request->key == 2){
        $data = HotItem::orderBy('description','desc')->get();
        return response()->json([
            'data' => $data,
        ]);
       }else if($request->key == 3){
        $data = HotItem::orderBy('price','desc')->get();
        return response()->json([
            'data' => $data,
        ]);
       }else if($request->key == 4){
        $data = HotItem::orderBy('price','asc')->get();
        return response()->json([
            'data' => $data,
        ]);
       }
    }

    //Search Category Id
    public function searchcategoryid(Request $request){
       $data =HotItem::where('category',$request->key)->get();
       return response()->json([
        'data' => $data,
       ]);
    }

    //Detail Hot item
    public function detailhotitem(Request $request){
        $data = HotItem::select('*','categories.title as categorytitle','hot_items.description as cartdescription','availabilities.id as statusid','hot_items.id as hid')
        ->join('brands','brands.id','hot_items.brand')
        ->join('availabilities','availabilities.id','hot_items.availability')
        ->join('categories','categories.category_id','hot_items.category')
        ->where('hot_items.id',$request->key)->get();
        return response()->json([
            'data' => $data,
        ]);
    }

    //Detail Card
    public function detailcard(Request $request){
        $data = HotItem::where('id',$request->key)->get();
        return response()->json([
            'data' => $data,
        ]);
    }

    //Double Detail Card
    public function zoomdata(Request $request){
        $data = HotItem::select('*','categories.title as categorytitle','hot_items.description as cartdescription','availabilities.id as statusid','hot_items.id as hid')
        ->join('brands','brands.id','hot_items.brand')
        ->join('availabilities','availabilities.id','hot_items.availability')
        ->join('categories','categories.category_id','hot_items.category')
        ->where('hot_items.id',$request->key)->get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
