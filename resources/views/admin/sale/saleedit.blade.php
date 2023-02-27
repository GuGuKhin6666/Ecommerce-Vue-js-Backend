@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-4 ">
     <div class="border mt-5">
      <form action="{{route('update#sale',$item[0]['id'])}}" class="p-4" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group  ">
          <label for="">Title</label>
          <input type="text" name="title" value="{{old('title',$item[0]['title'])}}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title...">
          @error('title')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
          <label for="">Price</label>
          <input type="text" name="price" value="{{old('price',$item[0]['price'])}}" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Title...">
          @error('price')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

    
        <div class="form-group">
          <label for="">Description</label>
          <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="" cols="30" rows="5" placeholder="Enter Description...">{{old('description',$item[0]['description'])}}</textarea>
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
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
             <tr>
              <td>{{$item[0]['id']}}</td>
              <td>{{$item[0]['title']}}</td>
              <td>{{$item[0]['price']}}</td>
              <td>{{$item[0]['description']}}</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>



@endsection