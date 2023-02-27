<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
  //
  public function index()
  {
    $data = Categories::get();
    $Data = Post::get();
    return  view('admin.post.post', compact('data', 'Data'));
  }

  //Create Post
  public function createpost(Request $request)
  {
    $this->postValidation($request);
    $thing = $this->getdata($request);
    if ($request->postimage != null) {
      $newimage = uniqid() . 'sithu' . $request->file('postimage')->getClientOriginalName();
      $request->file('postimage')->storeAs('public', $newimage);
      $thing['image'] = $newimage;
      Post::create($thing);
      return back();
    } else {
      Post::create($thing);
      return back();
    }
  }

  //delete post
  public function postdelete($id)
  {
    $data = Post::where('post_id', $id)->first();
    $image = $data->image;
    Post::where('post_id', $id)->delete();
    if ($image != null) {
      Storage::delete('public/', $image);
    }
    return back();
  }

  //Edit page
  public function editpost($id)
  {
    $alldata = Categories::get();
    $data = Post::where('post_id', $id)->get();
    return view('admin.post.edit', compact('data', 'alldata'));
  }

  //Update Post
  public function postupdate($id, Request $request)
  {
    $this->postValidation($request);
    $thing = $this->getpostdata($request);
    if ($request->hasFile('postimage')) {
      $dbimage = Post::where('post_id', $id)->first();
      $dbimage = $dbimage->image;

      if ($dbimage != null) {
        Storage::delete('public', $dbimage);
      }

      $newimage = uniqid() . 'sithu' . $request->file('postimage')->getClientOriginalName();
      $request->file('postimage')->storeAs('public', $newimage);
      $thing['image'] = $newimage;

      Post::where('post_id', $id)->update($thing);
      $data = Categories::get();
      $Data = Post::get();
      return redirect()->route('post#page',compact('data','Data'));
    } else {
      Post::where('post_id', $id)->update($thing);
      $data = Categories::get();
      $Data = Post::get();
      return redirect()->route('post#page',compact('data','Data'));
    }
  }

  //Post Validation
  private function postValidation($request)
  {
    Validator::make($request->all(), [
      'posttitle' => 'required',
      'price'   => 'required',
      'postcategory' => 'required',
      'postdescription' => 'required',
    ])->validate();
  }

  //Store Post data
  private function getdata($request)
  {
    return [
      'title' => $request->posttitle,
      'price' => $request->price,
      'description' => $request->postdescription,
      'category_id' => $request->postcategory,
    ];
  }

  //Update Post Data
  private function getpostdata($request)
  {
    return [
      'title' => $request->posttitle,
      'price' => $request->price,
      'description' => $request->postdescription,
      'category_id' => $request->postcategory,
    ];
  }
}
