@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-4 ">
     <div class="border mt-5">
      <form action="{{route('update#ava',$data[0]['id'])}}" class="p-4" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group  ">
          <label for="">Brand Name</label>
          <input type="text" name="condition" value="{{old('condition',$data[0]['condition'])}}"  class="form-control @error('condition') is-invalid @enderror">
          @error('condition')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="">Description</label>
        <textarea name="description" id=""   class="@error('description') is-invalid @enderror form-control" cols="30" rows="5">{{old('description',$data[0]['description'])}}</textarea>
          @error('description')
          <small class="text-danger">{{$message}}</small>
        @enderror
        </div>

        <div>
          <button type="submit" class="btn btn-dark text-white">Update</button>
        </div>
        
    </form>
     </div>
    </div>
    <div class="col-8 ">
      <div class="card">
        <div class="card-header">
        
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Brand Name</th>
                <th>Description</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
               <td>{{$item->id}}</td>
               <td>{{$item->condition}}</td>
               <td>{{$item->description}}</td>
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