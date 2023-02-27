<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AvailabilityController extends Controller
{
    //Availability Page
    public function avapage(){
        $item = Availability::get();
        return view('admin.availability.ava',compact('item'));
    }

    //Availability create
    public function createava(Request $request){
        $this->avaValidation($request);
        $data = $this->getdata($request);
        Availability::create($data);
        return back();
    }

    //Availability edit
    public function editava($id){
        $data = Availability::where('id',$id)->get();
        return view('admin.availability.editava',compact('data'));
    }

    //Availability update 
    public function updateava(Request $request,$id){
        $this->avaValidation($request);
        $data = $this->getdata($request);
        Availability::where('id',$id)->update($data);
        $item = Availability::get();
        return redirect()->route('ava#page',compact('item'));
    }

    //Availability delete 
    public function deleteava($id){
        Availability::where('id',$id)->delete();
        $item = Availability::get();
        return redirect()->route('ava#page',compact('item'));
    }

    //Check Availability
    private function avaValidation($request){
        Validator::make($request->all(),[
            'condition' => 'required',
            'description' => 'required',
        ])->validate();
    }

    //Insret Data into brand database
    private function getdata($request){
        return [
            'condition' => $request->condition,
            'description' => $request->description,
        ];
    }
    
}
