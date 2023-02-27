<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function index(){
        $data = Categories::get();
       return  view('admin.category.category',compact('data'));
    }

    //Category Create
    public function createcategory(Request $request){
        $this->categoryValidation($request);
        $data =   $this->getcategorydata($request);
        Categories::create($data);
        return back();
    }

    //delete category
    public function deletecategory($id){
       Categories::where('category_id',$id)->delete();
       return back();
    }

    //search Key
    public function searchkey(Request $request){
       $data = Categories::where('title','LIKE','%'.$request->searchkey.'%')
       ->get();
       return view('admin.category.category',compact('data'));
    }

    //edit Categoty
    public function editcategory($id){
        $data = Categories::where('category_id',$id)->get();
        return view('admin.category.edit',compact('data'));
    }

    //Update Category Data
    public function updatecategory(Request $request,$id){
        $this->categoryValidation($request);
        $thing = [
            'title' => $request->categoryname,
            'description' => $request->description,
        ];
        $data = Categories::get();
        Categories::where('category_id',$id)->update($thing);
        return view('admin.category.category',compact('data'));
    
    }

    // Get Category Data
    private function getcategorydata($request){
        return [
            'title' => $request->categoryname,
            'description' => $request->description,
           ];
    }

    //Category Validation
    private function categoryValidation($request){
        Validator::make($request->all(),[
            'categoryname' => 'required',
            'description' => 'required',
        ])->validate();
    }
}
