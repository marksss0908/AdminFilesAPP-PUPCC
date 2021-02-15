@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Subfolder</h1>


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


<form action ="{{ route('subfolder.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="Filename">Subfolder Name</label>
        <input type="text" class="form-control" name ="subfoldername" placeholder="Enter Subfolder Name">
    </div>

    <div class="form-group">
      <label for="Select Folder">Select Folder</label>
      <select class="form-control" id="exampleFormControlSelect1" name ="folder_id">

        @foreach ($folders as $folder)
        <option value = "{{ $folder->id}}">{{ $folder->folder_name}}</option>
        @endforeach
          
      </select>
    </div>

      <button type = "submit" class="btn btn-sm btn-primary mt-3">Save</button>
      <a class="btn btn-sm btn-primary mt-3" href = {{route ('dashboard.index')}}>Cancel</a>

    </form>


@endsection