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
                                    <label for="tanggal_jadwal" class="col-form-label">Tanggal Iklan</label>
                                </div>
                                <div class="col-7">
                                    <input class="form-control" name="tanggal_jadwal" type="date">
                                </div>
                                <div class="col-2">
                                    <input class="btn btn-primary" type="submit" value="Search">
                                </div>
                            </div>
                            <div class="row">
                                <a class="col-12 mini-link" href="/lihatclient">Client sudah terdaftar</a>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}

                    @if(isset($request))
                        <div class="card-body align-center-vh">
                            <div class="content-width">
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr class="d-flex">
                                        <th class="col-12" colspan="3">
                                            <h3>Hasil Pencarian untuk {{$request->jenis_iklan}} pada
                                                tanggal {{$request->tanggal_jadwal}}</h3>
                                        </th>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col">#</th>
                                        <th class="col">Jam Jadwal</th>
                                        <th class="col">Nama Produk</th>
                                        <th class="col">Versi</th>
                                        <th class="col">Kategori</th>
                                        <th class="col">Priode Tayang</th>
                                        <th class="col">No Order</th>
                                        <th class="col">AE</th>
                                        <th class="col">Status Order</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results as $result)
                                        <tr class="d-flex">
                                            <th class="col">{{ $loop->iteration }}</th>
                                            <td class="col">{{$result->jam_jadwal}}</td>
                                            <td class="col">{{$result->nama_produk}}</td>
                                            <td class="col">{{$result->versi_iklan}}</td>
                                            <td class="col">{{$result->nama_kategori}}</td>
                                            @if($result->priode_awal != null)
                                                <td class="col">{{$result->priode_awal}}
                                                    - {{$result->priode_akhir}}</td>
                                            @else
                                                <td class="col"></td>
                                            @endif
                                            <td class="col">{{$result->id_order_iklan}}</td>
                                            <td class="col">{{$result->name}}</td>
                                            <td class="col">{{$result->status_order}}</td>
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