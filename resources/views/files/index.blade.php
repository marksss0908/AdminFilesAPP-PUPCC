@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Contents of <strong>{{ $subfolder->subfolder_name }}</strong></h1>
  
    {{-- <p>count of file in this folder <strong>{{$count_file[0]->subfolder->id}} </strong> </p> --}}
    <a class="btn btn-sm btn-primary mb-4 ml-5" href="{{ route('files.create', $subfolder->id)}}">Add File</a>

        <table class="table table-bordered ml-3 mr-3" id = "files-table">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($files as $file)
                    <tr>       
                        <td>{{ $file->filename }}</td>
                        <td>{{ $file->description }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route ('file.download', $file->id)}}">Download</a>
                            <a class="btn btn-sm btn-danger" href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection


@section('pages_level_css')
    <!-- Custom styles for this page -->
    <link href="{{('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
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