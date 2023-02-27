<?php

namespace App\Http\Controllers;
use App\Models\Action_log;
use Illuminate\Http\Request;

class ActionLogController extends Controller
{
    //
    public function searchview(Request $request){
        $data = [
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
        ];

        logger($data);

        Action_log::create($data);

        $data = Action_log::where('post_id',$request->post_id)->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}
