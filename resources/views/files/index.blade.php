@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Contents of <strong>{{ $files[0]->subfolder->subfolder_name }}</strong></h1>
<div class="row">

<a class="btn btn-sm btn-primary mb-4 ml-5" href="{{ route('files.create', $files[0]->subfolder->id)}}">Add File</a>

    <table class="table table-bordered ml-3 mr-3">
        <thead>
            <tr>
                <th>File ID</th>
                <th>File Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td>{{ $file->filename }}</td>
                    <td>{{ $file->description }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="#">View</a>
                        <a class="btn btn-sm btn-danger" href="#">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection