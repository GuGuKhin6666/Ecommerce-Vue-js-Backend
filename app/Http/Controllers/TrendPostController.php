<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categories;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TrendPostController extends Controller
{
  //
  public function index()
  {
    $data = Categories::get();
    $Data = Reaction::get();
    return  view('admin.trend_post.trendpost', compact('data', 'Data'));
  }

  //Create Post
  public function createtrendpost(Request $request)
  {
    $this->trendpostValidation($request);
    $thing = $this->getdata($request);
    if ($request->postimage != null) {
      $newimage = uniqid() . 'sithu' . $request->file('postimage')->getClientOriginalName();
      $request->file('postimage')->storeAs('public', $newimage);
      $thing['image'] = $newimage;
      Reaction::create($thing);
      return back();
    } else {
      Reaction::create($thing);
      return back();
    }
  }

  //delete post
  public function trendpostdelete($id)
  {
    $data = Reaction::where('post_id', $id)->first();
    $image = $data->image;
    Reaction::where('post_id', $id)->delete();
    if ($image != null) {
      Storage::delete('public/', $image);
    }
    return back();
  }

  //Edit page
  public function edittrendpost($id)
  {
    $alldata = Categories::get();
    $data = Reaction::where('post_id', $id)->get();
    return view('admin.trend_post.edittrendpost', compact('data', 'alldata'));
  }

  //Update Post
  public function trendpostupdate($id, Request $request)
  {
    $this->trendpostValidation($request);
    $thing = $this->getpostdata($request);
    if ($request->hasFile('postimage')) {
      $dbimage = Reaction::where('post_id', $id)->first();
      $dbimage = $dbimage->image;

      if ($dbimage != null) {
        Storage::delete('public', $dbimage);
      }

      $newimage = uniqid() . 'sithu' . $request->file('postimage')->getClientOriginalName();
      $request->file('postimage')->storeAs('public', $newimage);
      $thing['image'] = $newimage;

      Reaction::where('post_id', $id)->update($thing);
      $data = Categories::get();
      $Data = Reaction::get();
      return  view('admin.trend_post.trendpost', compact('data', 'Data'));
    } else {
      Reaction::where('post_id', $id)->update($thing);
      $data = Categories::get();
      $Data = Reaction::get();
      return  view('admin.trend_post.trendpost', compact('data', 'Data'));
    }
  }

  //Post Validation
  private function trendpostValidation($request)
  {
    Validator::make($request->all(), [
      'posttitle' => 'required',
      'price' => 'required',
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
