@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-4 ">
     <div class="border mt-5">
      <form action="{{route('post#update',$data[0]['post_id'])}}" class="p-4" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group  ">
          <label for="">Title</label>
          <input type="text" name="posttitle" value="{{old('posttitle',$data[0]['title'])}}" class="form-control @error('posttitle') is-invalid @enderror" placeholder="Enter Title...">
          @error('posttitle')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
          <label for="">Price</label>
          <input type="text" name="price" value="{{old('price',$data[0]['price'])}}" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Title...">
          @error('price')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group  ">
          <label for="">Image</label>
           <div>
            @if($data[0]['image'] != null)
            <img src="{{asset('storage/'.$data[0]['image'])}}"  style="width: 325px;height:200px;object-fit:cover;" alt="">
            @else
            <img src="{{asset('image/default-upload-image.jpeg')}}"  style="width: 325px;height:200px;object-fit:cover;" alt="">
            @endif
            <input type="file" name="postimage"  class="form-control @error('postimage') is-invalid @enderror">
        </div>
        </div>

        <div class="form-group  ">
          <label for="">Category Name</label>
         <select name="postcategory" class="form-control" id="">
          <option value="null">Choose Category...</option>
          @foreach ($alldata as $item)
            <option value="{{$item->category_id}}" @if ($item->category_id == $data[0]['category_id']) selected  @endif>{{$item->title}}</option>
          @endforeach
         </select>
          @error('posttitle')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="">Description</label>
          <textarea name="postdescription" class="form-control  @error('postdescription') is-invalid @enderror" id="" cols="30" rows="5" placeholder="Enter Description...">{{old('description',$data[0]['description'])}}</textarea>
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