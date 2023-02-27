@extends('admin.layouts.master')

@section('content')

<div class="row mt-4">
    <div class="col-4 ">
     <div class="border mt-5">
      <form action="{{route('create#ava')}}" class="p-4" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group  ">
          <label for="">Condition</label>
          <input type="text" name="condition" class="form-control @error('condition') is-invalid @enderror">
          @error('condition')
            <small class="text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="">Description</label>
          <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="" cols="30" rows="5"></textarea>
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
                <th>ID</th>
                <th>Category Name</th>
                <th>Created Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             @foreach ($item as $d)
             <tr>
              <td>{{$d->id}}</td>
              <td>{{$d->condition}}</td>
              <td>{{$d->description}}</td>
              <td>
               <a href="{{route('edit#ava',$d->id)}}"> <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                <a href="{{route('delete#ava',$d->id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
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