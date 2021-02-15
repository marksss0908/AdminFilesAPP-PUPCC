@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<div class="row">
    <div>
    </div>
    <div class="col-lg-6 mb-4 ml-auto text-center">
        <a class="btn btn-md btn-primary mr-4" href="{{route('folder.create')}}">Add Folder</a>
        <a class="btn btn-md btn-primary" href="{{route('subfolder.create')}}">Add subfolder</a>
    </div>
</div>

{{-- show message --}}
    {{-- message of folder --}}
    @if(Session::has('Folderadded'))     
            <div class="row ">
                <div class="col-12">
                    <div class="alert alert-success">
                        {{Session::get('Folderadded')}}
                    </div>
                </div>
            </div>
        @endif
    {{-- message of subfolerfolder --}}
        @if(Session::has('Subfolderadded'))     
        <div class="row ">
            <div class="col-12">
                <div class="alert alert-success">
                    {{Session::get('Subfolderadded')}}
                </div>
            </div>
        </div>
    @endif
{{-- end of show message --}}
<!-- Content Row -->
<div class="row">

    <!-- Count number of file -->
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Number of Files</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$fileCount}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Count number of folder -->
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success  text-uppercase mb-1">
                            Number of Folders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$folderCount}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Count number of subfodler-->
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Number of Subfolder</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$subfolderCount}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection