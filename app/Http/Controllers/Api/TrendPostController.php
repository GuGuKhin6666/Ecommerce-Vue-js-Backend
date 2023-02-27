<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reaction;
use Illuminate\Http\Request;

class TrendPostController extends Controller
{
    public function trendpost(){
        $data = Reaction::get();
        return response()->json([
            'data' => $data ,
        ]);
    }
}
