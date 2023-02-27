<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleItemController extends Controller
{
    //Sale Item
    public function saleitem(){
        $data = SaleItem::get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
