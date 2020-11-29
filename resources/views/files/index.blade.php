@extends('layouts.master_layout')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Folder Contents</h1>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>File ID</th>
                <th>File Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td>{{ $file->filename }}</td>
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