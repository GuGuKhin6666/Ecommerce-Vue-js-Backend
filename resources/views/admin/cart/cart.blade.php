@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-4 ">
     <div class="border mt-5">
      <form action="{{route('create#cart')}}" class="p-4" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group  ">
          <label for="">Title</label>
          <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title...">
          @error('title')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>


        <div class="form-group  ">
          <label for="">Price</label>
          <input type="text" name="price" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Price...">
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
            <option value="{{$item->category_id}}">{{$item->title}}</option>
          @endforeach
         </select>
          @error('posttitle')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
            <label for="">Brand</label>
           <select name="brand" class="form-control" id="">
            <option value="null">Choose Brand...</option>
            @foreach ($thing as $item)
              <option value="{{$item->id}}">{{$item->brandname}}</option>
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
              <option value="{{$data->id}}">{{$data->condition}}</option> 
            @endforeach
           </select>
            @error('availability')
              <small class="text-danger">{{$message}}</small>
            @enderror
          </div>


        <div class="form-group">
          <label for="">Description</label>
          <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="" cols="30" rows="5" placeholder="Enter Description...">{{old('description')}}</textarea>
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
               <a href="{{route('edit#cart',$d->id)}}"> <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                <a href="{{route('delete#cart',$d->id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
              </td>
            </tr>
             @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="row  justify-content-end ">
        <div class="col-2" style="margin-right:50px ">
          {{$items->links()}}
        </div>
       </div>
      <!-- /.card -->
    </div>
  </div>





@endsection