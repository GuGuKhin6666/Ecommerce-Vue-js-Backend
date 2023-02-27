<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    //Get Count Data from Orderlist
    public function getcount(){
        $data = OrderList::get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
