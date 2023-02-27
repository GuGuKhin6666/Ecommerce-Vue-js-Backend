<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function index(){
       return view('admin.profile.app');
    }

    //update profile
    public function updateprofile(Request $request){
         $this->dataValidation($request);
         $data = $this->getdata($request);
         $currentId = Auth::user()->id;
         User::where('id',$currentId)->update($data);
         return redirect()->route('dashboard#page')->with(['requestdata' => 'Account Data Updated']);   
    }

    //change Password Page
    public function changepassword(){
        return view('admin.profile.changepsw');
    }

    //Password Update
    public function passwordupdate(Request $request){
      $this->passwordValidation($request);
      $id = Auth::user()->id;
      $dbpsw = User::where('id',$id)->first();
      $dbpsw = $dbpsw->password;
      $oldpassword = $request->oldpassword;

     if(Hash::check($oldpassword,$dbpsw)){
        $updatepsw = [
            'password' => Hash::make($request->newpassword),
            'updated_at' => Carbon::now(),
        ];
        User::where('id',$id)->update($updatepsw);
        return redirect()->route('dashboard#page');
     }else{
        return back()->with(['passworderror' => 'Your password is not incorrect']);
    } 
}


//delete Account
public function itemdelete($id){
   User::where('id',$id)->delete();
   return back();
}


    //Profile Updata data Validation
    private function dataValidation($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ])->validate();
    }

    //Insert Profile data to database
    private function getdata($request){
       return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'updated_at' => Carbon::now(),
        ];
    }

    //Password Validation
    private function passwordValidation($request){
       Validator::make($request->all(),[
        'oldpassword' => 'required',
        'newpassword' => 'required | min:8 | max:15',
        'comfirmpassword' => 'required | min:8 | max:15 | same:newpassword ',
       ])->validate();
    }
}
