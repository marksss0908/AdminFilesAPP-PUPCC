@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Files</h1>



 {{-- error validation --}}
    @if ($errors->any())
      <div class="row">
        <div class="col-12">
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    @endif
  
    <div class="row ml-3 col-lg-12">
      <form action ="{{ route('files.store', $subfolder->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Filename">File name</label>
                <input type="text" class="form-control" name ="filename" placeholder="Enter File Name">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" class="form-control" name ="description" placeholder="Enter Description">
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name ="subfolder_id" placeholder="Enter Description" value="{{ $subfolder->id }}">
            </div>
            <div class="form-group">
                <label for="File">File</label>
                <input type="file" class="form-control-file" name = "file" >
            </div>
              <button type = "submit" class="btn btn-md btn-primary mt-3 ">Save</button>
              <a class="btn btn-md btn-primary mt-3" href = {{route ('dashboard.index')}}>Cancel</a>
      </form>
      
    </div>
    @endsection