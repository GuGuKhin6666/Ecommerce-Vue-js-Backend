<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Availability;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AvailabilityController extends Controller
{
     //Availability data
     public function avadata(){
        $data = Availability::get();
        return response()->json([
            'data' => $data,
        ]);
    }

      //Search Availability
      public function searchcondition(Request $request){
        $data = Cart::where('availability',$request->key)->get();
        return response()->json([
          'data' => $data,
        ]);
      }
}
