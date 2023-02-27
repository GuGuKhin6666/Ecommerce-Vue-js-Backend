@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-4 ">
     <div class="border mt-5">
      <form action="{{route('update#category',$data[0]['category_id'])}}" class="p-4" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group  ">
          <label for="">Category Name</label>
          <input type="text" name="categoryname" value="{{old('categoryname',$data[0]['title'])}}"  class="form-control @error('categoryname') is-invalid @enderror">
          @error('categoryname')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="">Description</label>
        <textarea name="description" id=""   class="@error('description') is-invalid @enderror form-control" cols="30" rows="5">{{old('categoryname',$data[0]['description'])}}</textarea>
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
                <th>Category Name</th>
                <th>Created Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
               <td>{{$item->title}}</td>
               <td>{{$item->title}}</td>
               <td>{{$item->description}}</td>
               <td>
                 <a href="{{route('delete#category',$item->category_id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
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