@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-8 offset-3 mt-5">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <legend class="text-center">User Profile</legend>
          </div>
       @if (Session::has('requestdata'))
       <div class="alert d-flex alert-success  alert-dismissible fade show" role="alert">
        <strong class="mt-1">{{session('requestdata')}}</strong>
        <button type="button" class="btn-close btn btn-outline-white fs-3 " style="margin-left: 250px" data-bs-dismiss="alert" aria-label="Close"><i class="fa-sharp fa-solid fa-xmark text-white "></i></button>
      </div>
       @endif
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form action="{{route('update#profile')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{old('name',Auth::user()->name)}}" name="name" class="form-control" id="inputName" placeholder="Name">
                      @error('name')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email"  value="{{old('email',Auth::user()->email)}}" name="email" class="form-control" id="inputEmail" placeholder="Email">
                      @error('email')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="number"  value="{{old('phone',Auth::user()->phone)}}" name="phone" n class="form-control" id="inputEmail" placeholder="Phone">
                      @error('phone')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea name="address" id="" class="form-control" cols="30" placeholder="Address" rows="5">
                        {{old('address',Auth::user()->address)}}
                      </textarea>
                      @error('address')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                      <select name="gender" class="form-control" id="">
                        <option value="empty" @if (Auth::user()->gender == 'empty') selected @endif>Choose Your Option</option>
                        <option value="male" @if (Auth::user()->gender == 'male') selected @endif>Male</option>
                        <option value="female"  @if (Auth::user()->gender == 'female') selected @endif >Female</option>
                      </select>
                      @error('gender')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                  </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <a href="{{route('change#password')}}">Change Password</a>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn bg-dark text-white">Update</button>
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