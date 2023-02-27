<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //
    public function index(){
       $userData = User::get();
      return  view('admin.list.list',compact('userData'));
    }

    //Search Key
    public function searchkey(Request $request){
     $userData =   User::orwhere('name','LIKE','%'.$request->searchkey.'%')
                      ->  orwhere('email','LIKE','%'.$request->searchkey.'%')
                      ->  orwhere('phone','LIKE','%'.$request->searchkey.'%')
                      ->  orwhere('address','LIKE','%'.$request->searchkey.'%')
                      ->  orwhere('gender','LIKE','%'.$request->searchkey.'%')
                      ->get();
    return view('admin.list.list',compact('userData'));
    }
}

