@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-4 ">
     <div class="border mt-5">
      <form action="{{route('create#blogpost')}}" class="p-4" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group  ">
          <label for="">Title</label>
          <input type="text" name="title"  class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title...">
          @error('title')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
          <label for="">Image</label>
          <input type="file" name="image"  class="form-control @error('image') is-invalid @enderror" >
          @error('image')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
          <label for="">Blog Category Name</label>
         <select name="blogcategory" class="form-control" id="">
          <option value="null">Choose Category...</option>
          @foreach ($category as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
          @endforeach
         </select>
          @error('blogcategory')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
          <label for="">Blog Topic</label>
         <select name="blogtopic" class="form-control" id="">
          <option value="null">Choose Category...</option>
          @foreach ($topic as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
          @endforeach
         </select>
          @error('blogtopic')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
          <label for="">Blog Tag Name</label>
         <select name="blogtagpost" class="form-control" id="">
          <option value="null">Choose Category...</option>
          @foreach ($post as $item)
            <option value="{{$item->id}}">{{$item->title}}</option>
          @endforeach
         </select>
          @error('blogtagpost')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="">Description</label>
          <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="" cols="30" rows="5" placeholder="Enter Description..."></textarea>
          @error('description')
          <small class="text-danger">{{$message}}</small>
        @enderror
        </div>

        <div>
          <button type="submit" class="btn btn-dark text-white">Create</button>
        </div>
        
    </form>
     </div>
    </div>
    <div class="col-8 ">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            {{-- <button class="btn btn-sm btn-outline-dark">Add Category</button> --}}
          </h3>

          {{-- <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <form action="{{route('searchkey#page')}}" method="POST" enctype="multipart/form-data" class="d-flex">
                @csrf
                <input type="text" name="searchkey" value="{{request('searchkey')}}" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              </form>
            </div>
          </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($data as $d)
             <tr>
              <td>{{$d->id}}</td>
              <td>{{Str::words($d->title,5,'...')}}</td>
              <td>
                <div>
                  @if ($d->image == null)
                    <img src="{{asset('image/default-upload-image.jpeg')}}" class="shadow-sm rounded" style="width: 60px;height:60px;" alt="">
                  @else
                  <img src="{{asset('storage/'.$d->image)}}" class="shadow-sm rounded" style="width: 60px;height:60px;" alt="">
                  @endif
                </div>
              </td>
              <td>{{Str::words($d->description,3,'...')}}</td>
              <td>
               <a href="{{route('edit#blogpost',$d->id)}}"> <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                <a href=""><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
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