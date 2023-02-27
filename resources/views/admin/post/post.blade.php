@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-4 ">
     <div class="border mt-5">
      <form action="{{route('create#post')}}" class="p-4" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group  ">
          <label for="">Title</label>
          <input type="text" name="posttitle" value="{{old('posttitle')}}" class="form-control @error('posttitle') is-invalid @enderror" placeholder="Enter Title...">
          @error('posttitle')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>


        <div class="form-group  ">
          <label for="">Price</label>
          <input type="text" name="price" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Title...">
          @error('price')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
          <label for="">Image</label>
          <input type="file" name="postimage"  class="form-control @error('postimage') is-invalid @enderror" placeholder="Enter Image...">
          @error('postimage')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
          <label for="">Category Name</label>
         <select name="postcategory" class="form-control" id="">
          <option value="null">Choose Category...</option>
          @foreach ($data as $item)
            <option value="{{$item->category_id}}">{{$item->title}}</option>
          @endforeach
         </select>
          @error('posttitle')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="">Description</label>
          <textarea name="postdescription" class="form-control  @error('postdescription') is-invalid @enderror" id="" cols="30" rows="5" placeholder="Enter Description...">{{old('description')}}</textarea>
          @error('postdescription')
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
            <button class="btn btn-sm btn-outline-dark">Add Category</button>
          </h3>

          <div class="card-tools">
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
          </div>
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
             @foreach ($Data as $d)
             <tr>
              <td>{{$d->post_id}}</td>
              <td>{{$d->title}}</td>
              <td>
                <div>
                  @if ($d->image == null)
                    <img src="{{asset('image/default-upload-image.jpeg')}}" class="shadow-sm rounded" style="width: 60px;height:60px;" alt="">
                  @else
                  <img src="{{asset('storage/'.$d->image)}}" class="shadow-sm rounded" style="width: 60px;height:60px;" alt="">
                  @endif
                </div>
              </td>
              <td>{{$d->description}}</td>
              <td>
               <a href="{{route('edit#post',$d->post_id)}}"> <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                <a href="{{route('post#delete',$d->post_id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
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