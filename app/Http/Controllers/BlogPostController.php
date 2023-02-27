<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogTopic;
use App\Models\BlogTagpost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Validator;

class BlogPostController extends Controller
{
    //Blog Post
    public function blogpost(){
        $post = BlogTagpost::get();
        $topic = BlogTopic::get();
        $category = BlogCategory::get();
        $data = BlogPost::get();
        return view('admin.blogpost.blogpost',compact('post','topic','category','data'));
    }

    //Create Blog Post
    public function createblogpost(Request $request){
        $this->blogpostValidation($request);
        $data = $this->getdata($request);
        if($request->image != null){
            $newimage = uniqid() . 'sithu' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $newimage);
            $data['image'] = $newimage;
            BlogPost::create($data);
            $post = BlogTagpost::get();
            $topic = BlogTopic::get();
            $category = BlogCategory::get();
            return view('admin.blogpost.blogpost',compact('post','topic','category'));
        }else{
            BlogPost::create($data);
            $post = BlogTagpost::get();
            $topic = BlogTopic::get();
            $category = BlogCategory::get();
            return view('admin.blogpost.blogpost',compact('post','topic','category'));
        }
    }

    //Edit BLog Post
    public function editblogpost ($id){
        $post = BlogTagpost::get();
        $topic = BlogTopic::get();
        $category = BlogCategory::get();
        $data = BlogPost::where('id',$id)->get();
        return view('admin.blogpost.editblogpost', compact('post', 'topic', 'category', 'data'));
    }

    //Update blog Post
    public function updateblogpost(Request $request,$id){
       $Data = $this->getdata($request);
       if($request->hasFile('image')){
        $dbimg = BlogPost::where('id',$id)->get();
        $dbimg = $dbimg[0]['image'];
        
        if($dbimg != null){
            Storage::delete('public',$dbimg);
        }
        $newimage = Uniqid() . 'sithu' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public', $newimage);
        $Daga['image'] = $newimage;
        $post = BlogTagpost::get();
        $topic = BlogTopic::get();
        $category = BlogCategory::get();
        BlogPost::where('id',$id)->update($Data);
        return redirect()->route('blog#post',compact('post','topic','category'));      
       }else{
            $post = BlogTagpost::get();
            $topic = BlogTopic::get();
            $category = BlogCategory::get();
            BlogPost::where('id', $id)->update($Data);
            return redirect()->route('blog#post', compact('post', 'topic', 'category')); 
       };
    }
    

    //Blog Post Validation
    private function blogpostValidation($request){
        Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'blogtopic' => 'required',
            'blogtagpost' => 'required',
            'blogcategory' => 'required',
        ])->validate();
    }

    //Getdata from Blog Post 
    private function getdata($request){
        return [
            'title' => $request->title,
            'description' => $request->description,
            'blogtag' => $request->blogtagpost,
            'blogtopic' => $request->blogtopic,
            'blogcategory' => $request->blogcategory,
        ];
    }
}