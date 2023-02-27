<?php

namespace App\Http\Controllers;

use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaleItemController extends Controller
{
    //Sale Page
    public function salepage(){
        $data = SaleItem::get();
        return view('admin.sale.sale',compact('data'));
    }

    //Sale Create
    public function salecreate(Request $request){
       $this->saleValidation($request);
       $data = $this->getdata($request);
       SaleItem::create($data);
       return back();
    }

    //Sale Edit
    public function editsale($id){
        $item = SaleItem::where('id',$id)->get();
        return view('admin.sale.saleedit',compact('item'));
    }

    //Sale Delete
    public function saledelete($id){
       SaleItem::where('id',$id)->delete();
      
    }

    //update sale
    public function updatesale(Request $request,$id){
        $this->saleValidation($request);
        $data = $this->getdata($request);
        SaleItem::where('id',$id)->update($data);
        $data = SaleItem::get();
        return redirect()->route('sale#page',compact('data')); 
    }

    //Sale Validation
    private function saleValidation($request){
       Validator::make($request->all(),[
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
       ])->validate();
    }

    //insert data to db
    private function getdata($request){
        return [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ];
    }
}
