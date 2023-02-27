<?php

namespace App\Http\Controllers;

use App\Models\BlogTopic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogTopicController extends Controller
{
    //BLog Category Page
    public function blogtopic(){
        $data =BlogTopic::get();
        return view('admin.blogtopic.blogtopic',compact('data'));
    }

    //Create BLog Category
    public function createblogtopic(Request $request){
        $this->blogtopicValidation($request);
        $data =$this->getdata($request);
        BLogTopic::create($data);
        return back();
    }

    //Edit BLog Category Page
    public function editblogtopic($id){
        $data =BlogTopic::where('id',$id)->get();
        return view('admin.blogtopic.editblogtopic',compact('data'));
    }

    //Update Blog Category
    public function updateblogtopic($id,Request $request){
        $this->blogtopicValidation($request);
        $item =$this->getdata($request);
        blogtopic::where('id',$id)->update($item);
        $data =blogtopic::get();
        return redirect()->route('blog#topic',compact('data'));
    }

    //Delete Blog Category
    public function deleteblogtopic($id){
        BlogTopic::where('id',$id)->delete();
        $data =BlogTopic::get();
        return view('admin.blogtopic.blogtopic',compact('data'));
    }

    //Blogcategory Validation
    private function blogtopicValidation($request){
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
