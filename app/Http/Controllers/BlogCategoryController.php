<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    //BLog Category Page
    public function blogcategory(){
        $data =BlogCategory::get();
        return view('admin.blogcategory.blogcategory',compact('data'));
    }

    //Create BLog Category
    public function createblogcategory(Request $request){
        $this->blogcategoryValidation($request);
        $data =$this->getdata($request);
        BlogCategory::create($data);
        return back();
    }

    //Edit BLog Category Page
    public function editblogcategory($id){
        $data =BlogCategory::where('id',$id)->get();
        return view('admin.blogcategory.editblogcategory',compact('data'));
    }

    //Update Blog Category
    public function updateblogcategory($id,Request $request){
        $this->blogcategoryValidation($request);
        $item =$this->getdata($request);
        BlogCategory::where('id',$id)->update($item);
        $data =BlogCategory::get();
        return redirect()->route('blog#category',compact('data'));
    }

    //Delete Blog Category
    public function deleteblogcategory($id){
        BlogCategory::where('id',$id)->delete();
        $data =BlogCategory::get();
        return view('admin.blogcategory.blogcategory',compact('data'));
    }

    //Blogcategory Validation
    private function blogcategoryValidation($request){
        Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
        ])->validate();
    }

    //GEt Data
    private function getdata($request){
       return [
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ];
    }

}
