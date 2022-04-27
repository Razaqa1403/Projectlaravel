@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="bi bi-info-circle"></i>{{ __('Info Data') }}</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Info Data Meeting</h6>
                </div>

                <div class="card-body">

                        {{--  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="_method" value="PUT">  --}}
                        <form method="POST" action="{{ route('transaksi.info', $data->id) }}" autocomplete="off">
                            @csrf

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="jobsite">Jobsite:<span class="small"></span></label>
                                            <select class="form-select" aria-label="Default select example" name="jobsite" placeholder="Jobsite" value="{{ old('jobsite') }}" disabled>
                                                <option>-- Pilih Site --</option>
                                                <option {{ ($data->jobsite) == 'MGA' ? 'selected' : '' }} value="MGA">MGA</option>
                                                <option {{ ($data->jobsite) == 'DMI' ? 'selected' : '' }} value="DMI">DMI</option>
                                                <option {{ ($data->jobsite) == 'KMO' ? 'selected' : '' }} value="KMO">KMO</option>
                                                <option {{ ($data->jobsite) == 'JKT' ? 'selected' : '' }} value="JKT">JKT</option>
                                                <option {{ ($data->jobsite) == 'KUP' ? 'selected' : '' }} value="KUP">KUP</option>
                                                <option {{ ($data->jobsite) == 'DTA' ? 'selected' : '' }} value="DTA">DTA</option>
                                                <option {{ ($data->jobsite) == 'KJA' ? 'selected' : '' }} value="KJA">KJA</option>
                                                <option {{ ($data->jobsite) == 'SAB' ? 'selected' : '' }} value="SAB">SAB</option>
                                                <option {{ ($data->jobsite) == 'HPA' ? 'selected' : '' }} value="HPA">HPA</option>
                                                <option {{ ($data->jobsite) == 'BMI' ? 'selected' : '' }} value="BMI">BMI</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="meeting_name">Meeting name:</label>
                                            <select class="form-select" aria-label="Default select example" name="nama_meeting" disabled>
                                                <option selected>-- Nama Meeting --</option>
                                                <option {{ ($data->nama_meeting) == 'CFOR' ? 'selected' : '' }} value="CFOR">CFOR</option>
                                                <option {{ ($data->nama_meeting) == 'MPR' ? 'selected' : '' }} value="MPR">MPR</option>
                                                <option {{ ($data->nama_meeting) == 'Kpi Review' ? 'selected' : '' }} value="Kpi Review">Kpi Review</option>
                                                <option {{ ($data->nama_meeting) == 'Mid Riview' ? 'selected' : '' }} value="Mid Riview">Mid Riview</option>
                                                <option {{ ($data->nama_meeting) == 'Annual Meeting' ? 'selected' : '' }} value="Annual Meeting">Annual Meeting</option>
                                                <option {{ ($data->nama_meeting) == 'Raker Superitendent' ? 'selected' : '' }} value="Raker Superintendent">Raker Superintendent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group focused">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="{{ $data->jenis_meeting }}" @if($data->jenis_meeting == 'Meeting Offline') checked
                                                @endif name="jenis_meeting" id="jenis_meeting1" disabled>
                                                <label class="form-check-label" for="jenis_meeting1">
                                                Meeting Offline
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="{{ $data->jenis_meeting }}" @if($data->jenis_meeting == 'Meeting Online') checked
                                                @endif name="jenis_meeting" id="jenis_meeting2" disabled>
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
                                            <select class="form-select" aria-label="Default select example" name="tempat" disabled>
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
                                            <td><input name="tanggal" type="date" value="<?php echo date('Y-m-d'); ?>" disabled></td>
                                            <td><input name="waktu" type="time" disabled></td>
                                            <td><input name="hour" type="time" disabled></td>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="chair">Pemimpin Rapat/Chair:</label>
                                            <select class="form-select" aria-label="Default select example" name="pemimpin" disabled>
                                                <option selected>-- Pilih Pemimpin --</option>
                                                <option {{ ($data->pemimpin) == 'Achadi' ? 'selected' : '' }} value="Achadi">Achadi</option>
                                                <option {{ ($data->pemimpin) == 'Adrian Purwandha' ? 'selected' : '' }} value="Adrian Purwandha">Adrian Purwandha</option>
                                                <option {{ ($data->pemimpin) == 'Rochman Alamsjah' ? 'selected' : '' }} value="Rochman Alamsjah">Rochman Alamsjah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="notulen">Notulen:</label>
                                            <select class="form-select" aria-label="Default select example" name="notulen" disabled>
                                                <option selected>-- Pilih Notulen --</option>
                                                <option {{ ($data->notulen) == 'Novi Nuraini Hasanah' ? 'selected' : '' }} value="Novi Nuraini Hasanah">Novi Nuraini Hasanah</option>
                                                <option {{ ($data->notulen) == 'Tenny Aji Lestari' ? 'selected' : '' }} value="Tenny Aji Lestari">Tenny Aji Lestari</option>
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
                                                @endif type="radio" name="snack" disabled>
                                                <label class="form-check-label" for="inlineRadio1">IYA</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="snack" id="inlineRadio2" value="{{ $data->snack }}" @if($data->snack == 'TIDAK') checked
                                                @endif disabled>
                                                <label class="form-check-label" for="inlineRadio2">TIDAK</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="agenda">Agenda:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" value="{{ $data->agenda }}" name="agenda"  rows="3" >{{ $data->agenda }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="notes">Notes:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" value="{{ $data->notes }}" name="notes" rows="3">{{ $data->notes }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="chair">Peserta:</label>
                                            <select class="form-select" aria-label="Default select example" name="peserta" id="peserta" disabled>
                                                <option selected>-- Pilih Karyawan --</option>
                                                <option values="123">123 - Achadi</option>
                                                <option values="456">456 - Adrian Purwandha</option>
                                                <option values="789">789 - Rochman Alamsjah</option>
                                            </select>
                                            <button type="button" class="btn btn-primary" onclick="addItem()" disabled>+</button>
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

                        </form>

                </div>

            </div>

        </div>
@endsection
<script>
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

