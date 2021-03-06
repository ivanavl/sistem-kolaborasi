@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Permintaan Pemesanan</div>
                {{ Form::open(['action' => 'OrderIklanController@searchrequest','method' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="nama_client" class="col-form-label">Cari Pesanan</label>
                            </div>
                            <div class="col-7">
                                <input class="form-control" name="search" type="text"
                                       placeholder="input nama client/alamat/narahubung">
                            </div>
                            <div class="col-2">
                                <input class="btn btn-primary" type="submit" value="Cari">
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
                @if(isset($lihat_requests[0]))
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            <div class="table-container">
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No Order</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Jenis Iklan</th>
                                        <th>Nama Klien</th>
                                        <th>Nama Produk</th>
                                        <th>Periode Tayang</th>
                                        <th>Tanggal Konfirmasi</th>
                                        <th>Status Order</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lihat_requests as $request)
                                        <tr>
                                            <td>{{$request->id_order_iklan}}</td>
                                            <td>{{ \Carbon\Carbon::parse($request->tanggal_request)->translatedFormat('l, j F Y') }}</td>
                                            <td>{{$request->nama_jenis_iklan}}</td>
                                            <td>{{$request->nama_client}}</td>
                                            <td>{{$request->nama_produk}}</td>
                                            <td>{{\Carbon\Carbon::parse($request->priode_awal)->translatedFormat('l, j F Y') . " - " . \Carbon\Carbon::parse($request->priode_akhir)->translatedFormat('l, j F Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($request->tanggal_konfirmasi)->translatedFormat('l, j F Y') }}</td>
                                            @if($request->status_order == 'Requested')
                                                <td>
                                                    <a type="button"
                                                       href="/konfirmasipermintaanpemesanan/{{$request->id_order_iklan}}"
                                                       class="btn btn-primary">{{$request->status_order}}</a>
                                                </td>
                                            @else
                                                <td>{{$request->status_order}}</td>
                                            @endif
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
