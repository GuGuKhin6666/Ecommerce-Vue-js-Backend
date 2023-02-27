<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //Post Data
    public function postdata(){
        $data = Post::get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
