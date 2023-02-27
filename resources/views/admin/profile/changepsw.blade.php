@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-8 offset-3 mt-5">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <legend class="text-center">User Profile</legend>
          </div>
       @if (Session::has('passworderror'))
       <div class="alert d-flex alert-danger  alert-dismissible fade show" role="alert">
        <strong class="mt-1">{{session('passworderror')}}</strong>
        <button type="button" class="btn-close btn btn-outline-white fs-3 " style="margin-left: 200px" data-bs-dismiss="alert" aria-label="Close"><i class="fa-sharp fa-solid fa-xmark text-white "></i></button>
      </div>
       @endif
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form action="{{route('update#password')}}" class="form-horizontal" method="POST" >
                    @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="oldpassword" class="form-control" id="inputName" placeholder="Old Password">
                      @error('oldpassword')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password"  name="newpassword" class="form-control" id="inputEmail" placeholder="New Password">
                      @error('newpassword')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Comfirm Password</label>
                    <div class="col-sm-10">
                      <input type="password"  name="comfirmpassword"  class="form-control" id="inputEmail" placeholder="comfirmpassword">
                      @error('comfirmpassword')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn bg-dark text-white " >Change Password</button>
                    </div>
                  </div>
                </form>
                
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection