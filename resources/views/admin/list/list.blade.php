@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">User List</h3>

         
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <form action="{{route('search#key')}}" class="d-flex" method="POST">
                @csrf
                <input type="text" name="searchkey" value="{{request('searchkey')}}" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap text-center">
            <thead>
              <tr>
                <th>Id</th>
                <th> Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Address</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($userData as $item)
             <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->phone}}</td>
              <td>{{$item->gender}}</td>
              <td>{{$item->address}}</td>
              <td>
              @if ($item->id != Auth::user()->id)
               <form action="{{route('item#delete',$item->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
               </form>
              @endif
              </td>
            </tr>
             @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection