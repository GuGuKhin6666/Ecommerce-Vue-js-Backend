<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     //Category data
     public function categorydata(){
        $data = Categories::get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
