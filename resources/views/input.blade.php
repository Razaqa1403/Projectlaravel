@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="bi bi-journal-plus"></i>{{ __('Input MoM') }}</h1>

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

        <div class="col-lg-8 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Data Meeting</h6>
                </div>

                <div class="card-body">

                        {{--  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="_method" value="PUT">  --}}
                        <form method="POST" action="{{ route('transaksi.insert') }}" autocomplete="off">
                            @csrf

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="jobsite">Jobsite:<span class="small"></span></label>
                                            <select class="form-select input-lg dynamic" id="site" aria-label="Default select example" data-dependent="list-karyawan" name="jobsite">
                                                <option selected disabled>-- Pilih Site --</option>
                                                @foreach ($sites as $site )
                                                    <option value="{{ $site->siteID }}">{{ $site->siteID }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="meeting_name">Meeting name:</label>
                                            <select class="form-select" aria-label="Default select example" name="nama_meeting">
                                                <option selected>-- Nama Meeting --</option>
                                                @foreach ($namemeets as $namemeet )
                                                    <option value="{{ $namemeet->nameID }}"> {{ $namemeet->nameID }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group focused">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="Meeting Offline" name="jenis_meeting" id="jenis_meeting1">
                                                <label class="form-check-label" for="jenis_meeting1">
                                                Meeting Offline
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="Meeting Online" name="jenis_meeting" id="jenis_meeting2" checked>
                                                <label class="form-check-label" for="jenis_meeting2">
                                                Meeting Online
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label class="form-control-label" for="venue">Tempat/venue:</label>
                                            <select class="form-select" aria-label="Default select example" name="tempat" >
                                                <option selected>-- Pilih Ruangan --</option>
                                                <option value="Bougenvile 1">Bougenvile 1</option>
                                                <option value="Bougenvile 2">Bougenvile 2</option>
                                                <option value="Anggrek Room">Anggrek Room</option>
                                                <option value="Flamboyan Room">Flamboyan Room</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="date&time">Tanggal & Waktu/Date & Time:</label>
                                            <div class="form-check-inline">
                                            <td><input name="tanggal" type="date"></td>
                                            <td><input name="waktu" type="time"></td>
                                            <td><input name="hour" type="time"></td>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="chair">Pemimpin Rapat/Chair:</label>
                                            <select class="form-select input-lg dynamic list-karyawan" aria-label="Default select example" data-dependent="jobsite" name="pemimpin" id="pemimpin">
                                                <option selected>-- Pilih Pemimpin --</option>
                                                @foreach ($karyawans as $karyawan )
                                                    <option value=" {{ $karyawan->nick }} ">{{ $karyawan->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="notulen">Notulen:</label>
                                            <select class="form-select list-karyawan" aria-label="Default select example" name="notulen">
                                                <option selected>-- Pilih Notulen --</option>
                                                @foreach ($karyawans as $karyawan )
                                                    <option value=" {{ $karyawan->nick }} ">{{ $karyawan->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="snack">Snack:</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="snack" id="inlineRadio1" value="IYA">
                                                <label class="form-check-label" for="inlineRadio1">IYA</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="snack" id="inlineRadio2" value="TIDAK">
                                                <label class="form-check-label" for="inlineRadio2">TIDAK</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="notulen">Agenda:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="agenda" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="notulen">Notes:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="notes" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="chair">Peserta:</label>
                                            <select class="form-select input-lg dynamic list-karyawan" aria-label="Default select example" data-dependent="pemimpin" name="peserta" id="peserta">
                                                <option selected>-- Pilih Karyawan --</option>
                                                @foreach ( $karyawans as $karyawan )
                                                    <option value="{{ $karyawan->nama }}">{{ $karyawan->nama }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary" onclick="addItem()">+</button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table" >
                                    <thead>
                                     <tr>
                                      <th scope="col">NICK</th>
                                      <th scope="col">Nama</th>
                                     </tr>
                                    </thead>
                                    <tbody id="dynamic-list">

                                    </tbody>
                                </table>
                            </div>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                </div>

            </div>
            {{ csrf_field() }}

        </div>



@endsection

@section('extra-scripts')
<script>
    $(document).ready(function() {
        $('.dynamic').change(function(){
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();

            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('input.fetch') }}",
                    method:"POST",
                    data:{ select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                        $('.'+dependent).html(result);
                    }
                })
            }
        });
    });
    function addItem(){
      var ul = document.getElementById("dynamic-list");
      var peserta = document.getElementById("peserta");
      var optionValue = peserta.value;

      var arrValues = optionValue.split(" - ");

      var td1 = document.createElement("td");
      td1.appendChild(document.createTextNode(arrValues[0]));

      var td2 = document.createElement("td");
      td2.appendChild(document.createTextNode(arrValues[1]));

      var tr = document.createElement("tr");
      tr.setAttribute('id',peserta.value);
      tr.appendChild(td1);
      tr.appendChild(td2);

      ul.appendChild(tr);
    }


</script>
@endsection
