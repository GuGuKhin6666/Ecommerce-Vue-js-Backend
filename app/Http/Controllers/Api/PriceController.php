<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    //low to high
    public function lowtohigh(Request $request){
        $data = Cart::orderBy('price','asc')->get();
        return response()->json([
            'data'=>$data,
        ]);
    }

     //high to low
     public function hightolow(Request $request){
        $data = Cart::orderBy('price','desc')->get();
        return response()->json([
            'data'=>$data,
        ]);
    }
}
