@extends('AAAstisla.layouts.master_layout')

@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-4 text-gray-800">Folder <strong>{{ $folder->folder_name }}</strong></h1> --}}
    {{-- <h1 class="h3 mb-4 text-gray-800">Contents of <strong>{{ $subfolder->subfolder_name }}</strong></h1> --}}

    {{-- <p>count of file in this folder <strong>{{$count_file[0]->subfolder->id}} </strong> </p> --}}

    <h1 class = "mb-5 mt-5 text-dark">Contents of <strong>{{ $folder->folder_name}} {{$subfolder->subfolder_name}}</strong></h1>
    <a class="btn btn-lg btn-primary mb-4 ml-5" href="{{ route('files.create', [$folder->folder_name, $subfolder->subfolder_name, $subfolder->id])}}">Add File</a>


        @if(Session::has('Fileadded'))
            <div class="row ">
                <div class="col-12">
                    <div class="alert alert-success">
                        {{Session::get('Fileadded')}}
                    </div>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
              <h4>List of Files</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-dark" id = "files-table">
                    <thead>
                        <tr>
                            <th>Refference Number</th>
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
                                <td>{{ $file->id }}</td>
                                <td>{{ $file->filename }}</td>
                                <td>{{ $file->description }}</td>
                                <td>{{ $file->document }}</td>
                                <td>{{ $file->created_at->format('M d Y')}}</td>
                                <td>
                                    <a class="btn btn-primary btn-action" href="{{route ('file.edit', $file->id)}}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt text-dark"></i></a>
                                    </td>
                                    <td>
                                    <a class="btn btn-success btn-action" href="{{route ('file.download', $file->id)}}" data-toggle="tooltip" title="Download"><i class="fas fa-download text-dark"></i></a>
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