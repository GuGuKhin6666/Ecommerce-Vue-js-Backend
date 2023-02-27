<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BrandController extends Controller
{
    //Brand Page
    public function brandpage(){
        $item = Brand::get();
        return view('admin.brand.brand',compact('item'));
    }

    //Create Brand
    public function createbrand(Request $request){
        $this->brandValidation($request);
        $data = $this->getdata($request);
        Brand::create($data);
        return back();
    }

    //Edit Brand
    public function editbrand($id){
        $data = Brand::where('id',$id)->get();
        return view('admin.brand.editbrand',compact('data'));
    }

    //Update Brand 
    public function updatebrand(Request $request,$id){
        $this->brandValidation($request);
        $data = $this->getdata($request);
        Brand::where('id',$id)->update($data);
        $item = Brand::get();
        return redirect()->route('brand#page',compact('item'));
    }

    //delete brand 
    public function deletebrand($id){
        Brand::where('id',$id)->delete();
        $item = Brand::get();
        return redirect()->route('brand#page',compact('item'));
    }

    //Check Brand
    private function brandValidation($request){
        Validator::make($request->all(),[
            'brandname' => 'required',
            'branddescription' => 'required',
        ])->validate();
    }

    //Insret Data into brand database
    private function getdata($request){
        return [
            'brandname' => $request->brandname,
            'description' => $request->branddescription,
        ];
    }
}
