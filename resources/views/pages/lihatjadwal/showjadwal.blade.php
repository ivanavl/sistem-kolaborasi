@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lihat Jadwal Traffic Iklan</div>

                {{ Form::open(['action' => 'JadwalTrafficIklanController@showjadwalresult', 'method' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="jenis_iklan" class="col-form-label">Jenis Iklan</label>
                            </div>
                            <div class="col-7">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_iklan" id="jenis_iklan"
                                           value="Semua Iklan" checked>
                                    <label class="form-check-label" for="jenis_iklan">Semua Iklan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_iklan" id="jenis_iklan"
                                           value="Spot Iklan">
                                    <label class="form-check-label" for="jenis_iklan">Spot Iklan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_iklan" id="jenis_iklan"
                                           value="Talkshow">
                                    <label class="form-check-label" for="jenis_iklan">Talkshow</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_iklan" id="jenis_iklan"
                                           value="Ads Lips">
                                    <label class="form-check-label" for="jenis_iklan">Ads Lips</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="tanggal_jadwal" class="col-form-label">Tanggal Iklan</label>
                            </div>
                            <div class="col-7">
                                <input class="form-control" name="tanggal_jadwal" type="date">
                            </div>
                            <div class="col-2">
                                <input class="btn btn-primary" type="submit" value="Cari">
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
                @if(isset($request))
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            <div class="table-container">
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr class="table-title">
                                        <th colspan="10">
                                            <h3>Jadwal {{$request->jenis_iklan}}
                                                {{ \Carbon\Carbon::parse($request->tanggal_jadwal)->translatedFormat('l, j F Y') }}</h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Jam Jadwal</th>
                                        @if($request->jenis_iklan == "Semua Iklan")
                                            <th>Jenis Iklan</th>
                                        @endif
                                        <th>Nama Produk</th>
                                        @if($request->jenis_iklan == "Spot Iklan" || $request->jenis_iklan == "Semua Iklan")
                                            <th>Versi</th>
                                        @endif
                                        <th>Kategori</th>
                                        <th>Periode Tayang</th>
                                        <th>No Order</th>
                                        <th>AE</th>
                                        <th>Status Order</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results as $result)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{$result->jam_jadwal}}</td>
                                            @if($request->jenis_iklan == "Semua Iklan")
                                                <td>{{$result->nama_jenis_iklan}}</td>
                                            @endif
                                            <td>{{$result->nama_produk}}</td>
                                            @if($request->jenis_iklan == "Spot Iklan" || $request->jenis_iklan == "Semua Iklan")
                                                <td>{{$result->versi_iklan}}</td>
                                            @endif
                                            <td>{{$result->nama_kategori}}</td>
                                            @if($result->priode_awal != null)
                                                <td>{{\Carbon\Carbon::parse($result->priode_awal)->translatedFormat('l, j F Y') . " - " . \Carbon\Carbon::parse($result->priode_akhir)->translatedFormat('l, j F Y') }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{$result->id_order_iklan}}</td>
                                            <td>{{$result->name}}</td>
                                            <td>{{$result->status_order}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
