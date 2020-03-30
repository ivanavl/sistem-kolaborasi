@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="row justify-content-center full-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Jadwal Traffic Iklan</div>

                    {{ Form::open(['action' => 'JadwalTrafficIklanController@showjadwalresult', 'method' => 'POST']) }}
                    <div class="card-body align-center-vh">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label for="jenis_iklan" class="col-form-label">Jenis Iklan</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_iklan" id="jenis_iklan"
                                               value="spot iklan" checked>
                                        <label class="form-check-label" for="jenis_iklan">Spot Iklan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_iklan" id="jenis_iklan"
                                               value="talkshow">
                                        <label class="form-check-label" for="jenis_iklan">Talkshow</label>
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
                                    <input class="btn btn-primary" type="submit" value="Search">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                    @if(isset($request))
                        <div class="card-body align-center-vh">
                            <div class="content-width">
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr>
                                        <th colspan="9">
                                            <h3>Hasil Pencarian untuk {{$request->jenis_iklan}} pada
                                                tanggal {{$request->tanggal_jadwal}}</h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Jam Jadwal</th>
                                        <th>Nama Produk</th>
                                        <th>Versi</th>
                                        <th>Kategori</th>
                                        <th>Priode Tayang</th>
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
                                            <td>{{$result->nama_produk}}</td>
                                            <td>{{$result->versi_iklan}}</td>
                                            <td>{{$result->nama_kategori}}</td>
                                            @if($result->priode_awal != null)
                                                <td>{{$result->priode_awal}}
                                                    s.d. {{$result->priode_akhir}}</td>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection