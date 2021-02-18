@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Settings</h1>

{{-- <form action ="{{ route('setting.store')}}" method="post">
    @csrf
    <div class="form-group">
      <select class="form-control" id="exampleFormControlSelect1" name ="userid">
        @foreach ($users as $user)
        <option value = "{{ $user->id}}">{{ $user->name}}</option>
        @endforeach
      </select></div>

    <div class="form-group">
      <select class="form-control" id="exampleFormControlSelect1" name ="folderrole">
        @foreach ($roles as $role)
        <option value = "{{ $role->name}}">{{ $role->name}}</option>
        @endforeach
      </select>
    </div>

    <button type = "submit" class="btn btn-sm btn-primary mt-3">Save</button>
    <a class="btn btn-sm btn-primary mt-3" href = {{route ('dashboard.index')}}>Cancel</a>
</form> --}}

@role('Super Admin')

<div class="row">
  <div class="col-lg-6 mb-4 ml-auto text-center">
      <a class="btn btn-md btn-primary mr-4" href="{{route('register')}}">Register Employee</a>
      <a class="btn btn-md btn-primary mr-4" href="{{route('archive.index')}}">View Archive Files</a>
  </div>
</div> 

@endrole

 

@endsection