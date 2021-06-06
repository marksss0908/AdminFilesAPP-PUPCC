@extends('AAAstisla.layouts.master_layout')

@section('content')


<h1 class = "mb-5 mt-5 text-dark">{{$user = Auth::user()->role }} Dashboard </h1>



<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-folder"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header text-dark">
            <h4>Total Number of Files</h4>
          </div>
          <div class="card-body">
            {{$fileCount}}
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Sample</h4>
          </div>
          <div class="card-body">
            0
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Sample</h4>
          </div>
          <div class="card-body">
            0
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Sample</h4>
          </div>
          <div class="card-body">
            0
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-lg-6 ml-auto text-center mt-5 mb-5">
    <a href="{{ route('folder.create') }}" class="btn-lg btn-icon icon-left btn-primary mr-4 text-dark"><i class="far fa-edit text-dark"></i> <strong> Add Folder </strong></a>
    <a href="{{route('subfolder.create')}}" class="btn-lg btn-icon icon-left btn-primary text-dark"><i class="far fa-edit text-dark"></i> <strong> Add Subfolder </strong></a>
  </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Last Uploads</h4>
        </div>
        <div class="card-body">
                               
        <table class="table table-bordered text-dark" id = "files-table">
        <thead>
            <tr>
                <th>File Name</th>
                <th>Description</th>
                <th>Document</th>
                <th>Upload Date</th>
                <th></th>
                <th>Actions</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
                <tr>
                    <td>{{ $file->filename }}</td>
                    <td>{{ $file->description }}</td>
                    <td>{{ $file->document }}</td>
                    <td>{{ $file->created_at->format('M d, Y')}}</td>
                        {{-- <a class="btn btn-sm btn-success ml-3 mr-3" href="{{route ('file.download', $file->id)}}">Download</a> --}}
                        {{-- <a class="btn btn-sm btn-primary mr-3"  href="{{route ('file.edit', $file->id)}}">Edit</a> --}}
                        <td>
                        <a class="btn btn-primary btn-action" href="{{route ('file.edit', $file->id)}}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt text-dark"></i></a>
                        </td>
                        <td>
                        <a class="btn btn-success btn-action center" href="{{route ('file.download', $file->id)}}" data-toggle="tooltip" title="Download"><i class="fas fa-download text-dark"></i></a>
                        </td>
                        <td>
                        <form action="{{route ('archive.archive', $file->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" value="Delete" class ="btn btn-danger btn-action" data-toggle="tooltip" title="Archive"><i class="fas fa-trash text-dark"></i></button>
                            {{-- <a class="btn btn-danger btn-action mr-1" href="" data-toggle="tooltip" title="Edit"><i class="fas fa-download"></i></a> --}}
                        </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
      </div>
    </div>
</div>

@endsection
@section('pages_level_css')
    <!-- Custom styles for this page -->
    <link href="{{asset ('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection



@section('pages_level_scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
         $('#files-table').DataTable();
        });
    </script>
@endsection