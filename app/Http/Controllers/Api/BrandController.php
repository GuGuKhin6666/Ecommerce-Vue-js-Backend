<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    //Brand data
    public function branddata(){
        $data = Brand::get();
        return response()->json([
            'data' => $data,
        ]);
    }

    //Search Brand
    public function searchbrand(Request $request){
        $data = Cart::where('brand',$request->key)->get();
        return response()->json([
          'data' => $data,
        ]);
      }
}
