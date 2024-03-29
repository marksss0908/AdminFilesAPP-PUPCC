@extends('AAAstisla.layouts.master_layout')

@section('content')


    <h1 class="mb-5 mt-5 text-dark">{{ $user = Auth::user()->role }} Dashboard </h1>



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
                        {{ $fileCount }}
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
            <a href="{{ route('folder.create') }}" class="btn-lg btn-icon icon-left btn-primary mr-4 text-dark"><i
                    class="far fa-edit text-dark"></i> <strong> Add Folder </strong></a>
            <a href="{{ route('subfolder.create') }}" class="btn-lg btn-icon icon-left btn-primary text-dark"><i
                    class="far fa-edit text-dark"></i> <strong> Add Subfolder </strong></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Last Uploads</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-dark" id="files-table">
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>Description</th>
                                <th>Document</th>
                                <th>Upload Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)

                                <tr>
                                    <td>{{ $file->filename }}</td>
                                    <td>{{ $file->description }}</td>
                                    <td>{{ $file->document }}</td>
                                    <td>{{ $file->created_at->format('M d, Y') }}</td>

                                    <td class="d-flex justify-content-around">
                                        <a class="btn btn-primary btn-action" href="{{ route('file.edit', $file->id) }}"
                                            data-toggle="tooltip" title="Edit"><i
                                                class="fas fa-pencil-alt text-dark"></i>
                                        </a>
                                        <a class="btn btn-success btn-action center"
                                            href="{{ route('file.download', $file->id) }}" data-toggle="tooltip"
                                            title="Download"><i class="fas fa-download text-dark"></i>
                                        </a>
                                        <form action="{{ route('archive.archive', $file->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" value="Delete" class="btn btn-danger btn-action"
                                                data-toggle="tooltip" title="Archive"><i
                                                    class="fas fa-trash text-dark"></i></button>

                                        </form>
                                        {{-- data-id="{{($file->id)}}" --}}
                                        {{-- <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" 
                                            data-target="#mediumModal"> <i class="fas fa-plus-circle"></i>Share
                                        </a> --}}
                                        <button class="btn btn-sm btn-primary file" data-toggle="modal" data-target="#updateModal" data-id="{{ $file['id'] }}" data-name="{{ $file['status'] }}" >Share</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>



        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Logs</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-dark" id="files-table">
                        <thead>
                            <tr>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lastActivity as $activity)
                                <tr>
                                    <td>{{ $activity->description }}</td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Shared Files</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-dark" id="files-table">
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>Description</th>
                                <th>Document</th>
                                <th>Upload Date</th>
                                <th></th>
                                <th></th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sharedFiles as $sharedFile)
                                @if ($sharedFile->status === 'Registrar' || $sharedFile->status === 'Cashier' || $sharedFile->status === 'Director' )
                                    <tr>
                                        <td>{{ $sharedFile->filename }}</td>
                                        <td>{{ $sharedFile->description }}</td>
                                        <td>{{ $sharedFile->document }}</td>
                                        <td>{{ $sharedFile->created_at->format('M d, Y') }}</td>

                                        <td>
                                            <a class="btn btn-primary btn-action"
                                                href="{{ route('file.edit', $sharedFile->id) }}" data-toggle="tooltip"
                                                title="Edit"><i class="fas fa-pencil-alt text-dark"></i></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-action center"
                                                href="{{ route('file.download', $sharedFile->id) }}"
                                                data-toggle="tooltip" title="Download"><i
                                                    class="fas fa-download text-dark"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('archive.archive', $sharedFile->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" value="Delete" class="btn btn-danger btn-action"
                                                    data-toggle="tooltip" title="Archive"><i
                                                        class="fas fa-trash text-dark"></i></button>

                                            </form>
                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>



    <!-- Modal update-->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="POST">
                    @method('PUT')
                    @csrf  
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                            value="Registrar">
                        <label class="form-check-label" for="exampleRadios1">
                            Registrar
                        </label>
                    </div> --}}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Send To</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                          @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                          @endforeach
                        </select>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-action center" onclick="document.getElementById('updateForm').submit()">Share<i
                        class="fas fa-share text-white ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="modal fade" id="mediumModal" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Choose below sharing option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div class="container">


                        <form action="{{route('file.share', $file->id)}}" method="POST">
                            @csrf  

                         @method("PUT")

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                    value="Registrar">
                                <label class="form-check-label" for="exampleRadios1">
                                    Registrar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2"
                                    value="Cashier">
                                <label class="form-check-label" for="exampleRadios2">
                                    Cashier
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios3"
                                    value="Director">
                                <label class="form-check-label" for="exampleRadios3">
                                    Director
                                </label>
                            </div>
                            <button type="submit" class="btn btn-warning btn-action center mt-2" title="Share" }}> Share <i
                                    class="fas fa-share text-dark"></i>
                            </button>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <script>
        $(document).on('click', '#mediumButton', function(event) {

            

            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                    //$('#shareFile').attr("action", "/files/share/"+$(this).data("id")+"");
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script> --}}

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $('.file').each(function() {
          $(this).click(function(event){
            $('#updateForm').attr("action", "/files/share/"+$(this).data("id")+"")
            $('#status').val($(this).data("status"))
          })
        })
    });
</script>


@endsection
@section('pages_level_css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection



@section('pages_level_scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#files-table').DataTable();
        });
    </script>
@endsection
