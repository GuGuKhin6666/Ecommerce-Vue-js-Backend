@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-4 ">
     <div class="border mt-5">
      <form action="{{route('update#cart',$items[0]['id'])}}" class="p-4" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group  ">
          <label for="">Title</label>
          <input type="text" name="title" value="{{old('title',$items[0]['title'])}}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title...">
          @error('title')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>


        <div class="form-group  ">
          <label for="">Price</label>
          <input type="text" name="price" value="{{old('price',$items[0]['price'])}}" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Price...">
          @error('price')
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
          <label for="">Category Name</label>
         <select name="postcategory" class="form-control" id="">
          <option value="null">Choose Category...</option>
          @foreach ($data as $item)
            <option value="{{$item->category_id}}" @if (  $item->category_id == $items[0]['category'] )  selected  @endif>{{$item->title}}</option>
          @endforeach
         </select>
          @error('postcategory')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
            <label for="">Brand</label>
           <select name="brand" class="form-control" id="">
            <option value="null">Choose Brand...</option>
            @foreach ($thing as $item)
              <option value="{{$item->id}}" @if (  $item->id == $items[0]['brand'] )  selected  @endif>{{$item->brandname}}</option>
            @endforeach
           </select>
            @error('brand')
              <small class="text-danger">{{$message}}</small>
            @enderror
          </div>

          <div class="form-group  ">
            <label for="">Availability</label>
           <select name="availability" class="form-control" id="">
            <option value="null">Choose Condition...</option>
            @foreach ($statement as $data)
              <option value="{{$data->id}}" @if (  $data->id == $items[0]['availability'] )  selected  @endif>{{$data->condition}}</option> 
            @endforeach
           </select>
            @error('availability')
              <small class="text-danger">{{$message}}</small>
            @enderror
          </div>

        <div class="form-group">
          <label for="">Description</label>
          <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="" cols="30" rows="5" placeholder="Enter Description...">{{old('description',$items[0]['description'])}}</textarea>
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
                <th>No</th>
                <th>Title</th>
                <th>Image</th>
                <th>description</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($items as $d)
             <tr>
              <td>{{$d->id}}</td>
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