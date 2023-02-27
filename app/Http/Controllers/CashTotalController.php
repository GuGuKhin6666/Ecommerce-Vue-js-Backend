<?php

namespace App\Http\Controllers;

use App\Models\CashTotal;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CashTotalController extends Controller
{
    //
    public function cashtotalsum(Request $request){
        $data = $request->all();
        $totalvalue = $data['total'];
        $str = strtoupper(Str::random(2));
        $randomId = (string)rand(12, 500000000000000);
        $rand_code = $str.''.$randomId;  
        $current_date = Carbon::now()->format('Y-m-d');
      
        CashTotal::create([
            'total' => $totalvalue,
            'code' => $rand_code,
            'date'=>$current_date,
        ]); 

        return response()->json(['message' => 'Successfully order.']);
    }
    
}