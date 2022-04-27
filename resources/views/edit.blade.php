@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="bi bi-pencil-square"></i>{{ __('Form Edit') }}</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Change Data Meeting</h6>
                </div>

                <div class="card-body">

                        {{--  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="_method" value="PUT">  --}}
                        <form method="POST" id="target" action="{{ route('transaksi.update', $data->id) }}" autocomplete="off">
                            @csrf

                            <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="jobsite">Jobsite:<span class="small"></span></label>
                                                <select class="form-select input-lg dynamic" id="site" aria-label="Default select example" data-dependent="list-karyawan" name="jobsite">
                                                    <option selected disabled>-- Pilih Site --</option>
                                                    @foreach ($sites as $site )
                                                    <option {{ ($site->siteID) ==  ($data->jobsite)  ? 'selected' : '' }} value="{{ $site->siteID }}">{{ $site->siteID }}</option>
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
                                                    <option {{ ($namemeet->nameID) ==  ($data->nama_meeting)  ? 'selected' : '' }} value="{{ $namemeet->nameID }}"> {{ $namemeet->nameID }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group focused">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="{{ $data->jenis_meeting }}" @if($data->jenis_meeting == 'Meeting Offline') checked
                                                @endif name="jenis_meeting" id="jenis_meeting1">
                                                <label class="form-check-label" for="jenis_meeting1">
                                                Meeting Offline
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="{{ $data->jenis_meeting }}" @if($data->jenis_meeting == 'Meeting Online') checked
                                                @endif name="jenis_meeting" id="jenis_meeting2">
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
                                                <option {{ ($data->tempat) == 'Bougenvile 1' ? 'selected' : '' }} value="Bougenvile 1">Bougenvile 1</option>
                                                <option {{ ($data->tempat) == 'Bougenvile 2' ? 'selected' : '' }} value="Bougenvile 2">Bougenvile 2</option>
                                                <option {{ ($data->tempat) == 'Anggrek Room' ? 'selected' : '' }} value="Anggrek Room">Anggrek Room</option>
                                                <option {{ ($data->tempat) == 'Flamboyan Room' ? 'selected' : '' }} value="Flamboyan Room">Flamboyan Room</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="date&time">Tanggal & Waktu/Date & Time:</label>
                                            <div class="form-check-inline">
                                            <td><input name="tanggal" type="date" value="<?php echo date('Y-m-d'); ?>"></td>
                                            <td><input name="waktu" type="time" value="{{ $data->waktu }}"></td>
                                            <td><input name="hour" type="time" value="{{ $data->hour }}"></td>
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
                                                <option {{ ($karyawan->nick) ==  ($data->pemimpin)  ? 'selected' : '' }} value=" {{ $karyawan->nick }} ">{{ $karyawan->nama }}</option>
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
                                                <option {{ ($karyawan->nick) ==  ($data->notulen)  ? 'selected' : '' }} value=" {{ $karyawan->nick }} ">{{ $karyawan->nama }}</option>
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
                                                <input class="form-check-input" value="{{ $data->snack }}" @if($data->snack == 'IYA') checked
                                                @endif type="radio" name="snack">
                                                <label class="form-check-label" for="inlineRadio1">IYA</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="snack" id="inlineRadio2" value="{{ $data->snack }}" @if($data->snack == 'TIDAK') checked
                                                @endif>
                                                <label class="form-check-label" for="inlineRadio2">TIDAK</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="agenda">Agenda:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" value="{{ $data->agenda }}" name="agenda"  rows="3" >{{ $data->agenda }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="notes">Notes:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" value="{{ $data->notes }}" name="notes" rows="3">{{ $data->notes }}</textarea>
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
                                                    <option {{ ($karyawan->nama) ==  ($data->peserta)  ? 'selected' : '' }} value=" {{ $karyawan->nama }} ">{{ $karyawan->nama }}</option>
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
                                        <button type="button" class="btn-edit-mom btn btn-primary">Save Changes</button>
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
            console.log(value, dependent, select, _token);

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

    $(document).ready(function() {
        $('.btn-edit-mom').click(function(){
            var select = $(this).attr("id");
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                $('#target').submit();
                  Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                  Swal.fire('Changes are not saved', '', 'info')
                }
              })
        });
    });

</script>
@endsection
