@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Folder</h1>

<form action ="{{ route('folder.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="Filename">Folder Name</label>
        <input type="text" class="form-control" name ="foldername" placeholder="Enter Folder Name">
      </div>
      <button type = "submit" class="btn btn-sm btn-primary">Save</button>

    </form>


@endsection