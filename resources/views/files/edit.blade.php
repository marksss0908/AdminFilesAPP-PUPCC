@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Update Record</h1>

<div class="row ml-3 col-lg-12">

    <form action ="{{ route('file.update', $file)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Filename">File name</label>
                <input type="text" class="form-control" name ="filename" autocomplete="off" value ="{{ $file->filename }}">
              </div>
              <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" class="form-control" name ="description" autocomplete="off" value ="{{ $file->description }}">
              </div>
  
              <button type = "submit" class="btn btn-sm btn-primary"> Update </button>
  
          </form>
  
  
    </div>
@endsection