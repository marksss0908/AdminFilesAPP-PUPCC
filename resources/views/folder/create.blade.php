@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Folder</h1>

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

<form action ="{{ route('folder.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="Foldername">Folder Name</label>
        <input type="text" class="form-control" name ="foldername" placeholder="Enter Folder Name">
    </div>




    {{-- <label for="Permission">Select Permission</label>
    <div class="form-group">
      <select class="form-control" id="exampleFormControlSelect1" name ="folderrole">
        @foreach ($roles as $role)
        <option value = "{{ $role->name}}">{{ $role->name}}</option>
        @endforeach
      </select>
    </div> --}}

    <button type = "submit" class="btn btn-sm btn-primary mt-3">Save</button>
    <a class="btn btn-sm btn-primary mt-3" href = {{route ('dashboard.index')}}>Cancel</a>
  
</form>

@endsection