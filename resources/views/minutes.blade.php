@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="bi bi-journal-text"></i>{{ __('Meeting List') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger border-left-danger" role="alert">
        <ul class="pl-4 my-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="col-lg-12 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Meeting</h6>
            </div>

            <div class="card-body">

                <div class="btn-group">
                    <a href="/input" class="btn btn-primary active" aria-current="page">+</a>
                    <a href="/input" class="btn btn-primary">Tambah</a>
                </div>

                <table class="table mt-3">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Jobsite</th>
                        <th scope="col">Meeting</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Tanggal&Waktu</th>
                        <th scope="col">Pemimpin</th>
                        <th scope="col">Notulen</th>
                        <th scope="col">Agenda</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <tbody>
                            @foreach ($data as $value )
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $value->jobsite }}</td>
                                <td>{{ $value->nama_meeting }}</td>
                                <td>{{ $value->tempat }}</td>
                                <td>{{ $value->tanggal .'||'. $value->waktu .'-'. $value->hour }}</td>
                                <td>{{ $value->nama_pemimpin ?? '' }}</td>
                                <td>{{ $value->nama_notulen ?? ''}}</td>
                                <td>{{ $value->agenda }}</td>
                                <td>{{ $value->notes }}</td>
                                <td>
                                    <button class="btn-delete-mom btn btn-primary btn-sm" nilai-id="{{ $value->id }}">
                                            <i class="bi bi-trash-fill"></i>
                                    </button>

                                    <a href="{{ url('minutes/'. $value->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <a href="{{ url('info/'. $value->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-info-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++; ?>
                            @endforeach
                    </tbody>
                  </table>

            </div>

        </div>

    </div>

@endsection

@section('extra-scripts')
<script>
    $(document).ready(function() {
        $('.btn-delete-mom').click(function(){
            var select = $(this).attr("nilai-id");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('delete') }}" + "/" + select,
                        type: 'get',
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            location.reload(true);
                        },
                    });
                }
              })
        });
    });
</script>
@endsection
