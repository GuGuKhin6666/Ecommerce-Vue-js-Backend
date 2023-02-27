<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Categories;
use App\Models\Availability;
use App\Models\HotItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HotItemController extends Controller
{
    //Hotitem Page
    public function hotitempage(){
        $data = Categories::get();
        $thing = Brand::get();
        $statement = Availability::get();
        $items = HotItem::paginate(10);
        $items->appends(request()->all());
        return view('admin.hotitem.hotitem',compact('data','thing','statement','items'));
    }

    //Create Hotitem
    public function createhotitem(Request $request){
      $this->hotitemValidation($request);
      $array = $this->getdata($request);
      if ($request->image != null) {
        $newimage = uniqid() . 'sithu' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public', $newimage);
        $array['image'] = $newimage;
        HotItem::create($array);
        return back();
      } else {
        HotItem::create($array);
        return back();
      }
    }

    //Edit Hotitem 
    public function edithotitem($id){
      $data = Categories::get();
      $thing = Brand::get();
      $statement = Availability::get();
      $items = HotItem::where('id',$id)->get();
     return view ('admin.hotitem.edithotitem',compact('items','data','thing','statement'));
    }

    //Update hotitem
    public function updatehotitem(Request $request,$id){
      $datas = $this->getdata($request);
     if($request->hasFile('image')){
      $dbimage = HotItem::where('id',$id)->get();
      $dbimage = $dbimage[0]['image'];
      if($dbimage != null){
        Storage::delete('public',$dbimage);
      }

      $newimage = Uniqid() .'sithu'. $request->file('image')->getClientOriginalName();
      $request->file('image')->storeAs('public',$newimage);
      $datas['image'] = $newimage;

      HotItem::where('id',$id)->update($datas);
      $data = Categories::get();
      $thing = Brand::get();
      $statement = Availability::get();
      $items = HotItem::paginate(10);
      $items->appends(request()->all());
      return redirect()->route('hotitem#page',compact('data','thing','statement','items'));
     }else{
      HotItem::where('id',$id)->update($datas);
      $data = Categories::get();
      $thing = Brand::get();
      $statement = Availability::get();
      $items = HotItem::paginate(10);
      $items->appends(request()->all());
      return redirect()->route('hotitem#page',compact('data','thing','statement','items'));
     }
    }


    //Delete Hotitem
    public function deletehotitem($id){
      $dbimage = HotItem::where('id',$id)->first();
      $dbimage = $dbimage->image;
      if($dbimage != null){
        Storage::delete('public',$dbimage);
      }
      HotItem::where('id',$id)->delete();
      return back();
    }

    //Cart Validation
    private function hotitemValidation($request){
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
