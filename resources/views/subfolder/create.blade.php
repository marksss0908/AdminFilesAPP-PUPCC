@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Subfolder</h1>

<form action ="{{ route('subfolder.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="Filename">Subfolder Name</label>
        <input type="text" class="form-control" name ="subfoldername" placeholder="Enter Subfolder Name">
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Select Folder</label>
      <select class="form-control" id="exampleFormControlSelect1" name ="folder_id">

        @foreach ($folders as $folder)
        <option value = "{{ $folder->id}}">{{ $folder->folder_name}}</option>
        @endforeach
        
      
        
      </select>
    </div>

      <button type = "submit" class="btn btn-sm btn-primary">Save</button>

    </form>


@endsection