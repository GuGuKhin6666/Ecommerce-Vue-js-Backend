<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Availability;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

class CartController extends Controller
{
    //Cart Page
    public function cartpage(){
        $data = Categories::get();
        $thing = Brand::get();
        $statement = Availability::get();
        $items = Cart::paginate(10);
        $items->appends(request()->all());
        return view('admin.cart.cart',compact('data','thing','statement','items'));
    }

    //Create Cart
    public function createcart(Request $request){
      $this->cartValidation($request);
      $array = $this->getdata($request);
      if ($request->image != null) {
        $newimage = uniqid() . 'sithu' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public', $newimage);
        $array['image'] = $newimage;
        Cart::create($array);
        return back();
      } else {
        cart::create($array);
        return back();
      }
    }

    //Edit Cart 
    public function editcart($id){
      $data = Categories::get();
      $thing = Brand::get();
      $statement = Availability::get();
      $items = Cart::where('id',$id)->get();
     return view ('admin.cart.editcart',compact('items','data','thing','statement'));
    }

    //Update Cart
    public function updatecart(Request $request,$id){
      $datas = $this->getdata($request);
     if($request->hasFile('image')){
      $dbimage = Cart::where('id',$id)->get();
      $dbimage = $dbimage[0]['image'];
      if($dbimage != null){
        Storage::delete('public',$dbimage);
      }

      $newimage = Uniqid() .'sithu'. $request->file('image')->getClientOriginalName();
      $request->file('image')->storeAs('public',$newimage);
      $datas['image'] = $newimage;

      Cart::where('id',$id)->update($datas);
      $data = Categories::get();
      $thing = Brand::get();
      $statement = Availability::get();
      $items = Cart::paginate(10);
      $items->appends(request()->all());
      return redirect()->route('cart#page',compact('data','thing','statement','items'));
     }else{
      Cart::where('id',$id)->update($datas);
      $data = Categories::get();
      $thing = Brand::get();
      $statement = Availability::get();
      $items = Cart::paginate(10);
      $items->appends(request()->all());
      return redirect()->route('cart#page',compact('data','thing','statement','items'));
     }
    }


    //Delete Cart
    public function deletecart($id){
      $dbimage = Cart::where('id',$id)->first();
      $dbimage = $dbimage->image;
      if($dbimage != null){
        Storage::delete('public',$dbimage);
      }
      Cart::where('id',$id)->delete();
      return back();
    }

    //Cart Validation
    private function cartValidation($request){
      Validator::make($request->all(),[
        'title' =>'required',
        'price' =>'required',
        'description' => 'required',
        'image' =>'required',
        'postcategory' =>'required',
        'brand' =>'required',
        'availability' =>'required',
      ])->validate();
    }

        //Insert Data in cart
    private function getdata($request){
        return [
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->postcategory,
            'price' => $request->price,
            'brand' => $request->brand,
            'availability' => $request->availability,
        ];
    }
}