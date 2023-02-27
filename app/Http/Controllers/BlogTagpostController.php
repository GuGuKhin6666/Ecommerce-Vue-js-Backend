<?php

namespace App\Http\Controllers;

use App\Models\BlogTagpost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BLogTagpostController extends Controller
{
    //BLog Category Page
    public function blogtagpost(){
        $data =BlogTagpost::get();
        return view('admin.blogtagpost.blogtagpost',compact('data'));
    }

    //Create BLog Category
    public function createblogtagpost(Request $request){
        $this->blogtagpostValidation($request);
        $data =$this->getdata($request);
        BlogTagpost::create($data);
        return back();
    }

    //Edit BLog Category Page
    public function editblogtagpost($id){
        $data =BlogTagpost::where('id',$id)->get();
        return view('admin.blogtagpost.editblogtagpost',compact('data'));
    }

    //Update Blog Category
    public function updateblogtagpost($id,Request $request){
        $this->blogtagpostValidation($request);
        $item =$this->getdata($request);
        BlogTagpost::where('id',$id)->update($item);
        $data =BlogTagpost::get();
        return redirect()->route('blog#tagpost',compact('data'));
    }

    //Delete Blog Category
    public function deleteblogtagpost($id){
        BlogTagpost::where('id',$id)->delete();
        $data =BlogTagpost::get();
        return view('admin.blogtagpost.blogtagpost',compact('data'));
    }

    //Blogcategory Validation
    private function blogtagpostValidation($request){
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
