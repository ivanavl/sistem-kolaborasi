@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12 accordion" id="accordion-menu">
            <div class="card">
                <div class="card-header" id="accordion-heading-1" data-toggle="collapse"
                     data-target="#accordion-menu-1" aria-expanded="false" aria-controls="accordion-menu-1">
                    Lihat Permintaan Pemesanan Belum Dikonfirmasi
                </div>
                <div id="accordion-menu-1" class="collapse" aria-labelledby="accordion-heading-1"
                     data-parent="#accordion-menu">
                    <div class="card-body align-center-vh">
                        @if(count($lihat_requests1)>0)
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
                                            <th>Versi Iklan</th>
                                            <th>Periode Tayang</th>
                                            <th>Kategori</th>
                                            <th>AE</th>
                                            <th>Tanggal Konfirmasi</th>
                                            <th>Status Order</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lihat_requests1 as $request)
                                            <tr>
                                                <td>{{$request->id_order_iklan}}</td>
                                                <td>{{ \Carbon\Carbon::parse($request->tanggal_request)->translatedFormat('l, j F Y') }}</td>
                                                <td>{{$request->nama_jenis_iklan}}</td>
                                                <td>{{$request->nama_client}}</td>
                                                <td>{{$request->nama_produk}}</td>
                                                <td>{{$request->versi_iklan}}</td>
                                                <td>{{$request->priode_awal . " s.d. " . $request->priode_akhir}}</td>
                                                <td>{{$request->nama_kategori}}</td>
                                                <td>{{$request->name}}</td>
                                                <td>{{ \Carbon\Carbon::parse($request->tanggal_konfirmasi)->translatedFormat('l, j F Y') }}</td>
                                                <td>
                                                    <a type="button" href="/lihatpermintaan/{{$request->id_order_iklan}}"
                                                       class="btn btn-primary">{{$request->status_order}}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger" style="width: 100%">
                                Data tidak tersedia!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="accordion-heading-2" data-toggle="collapse"
                     data-target="#accordion-menu-2" aria-expanded="false" aria-controls="accordion-menu-2">
                    Lihat Permintaan Pemesanan Sudah Dikonfirmasi
                </div>
                <div id="accordion-menu-2" class="collapse" aria-labelledby="accordion-heading-2"
                     data-parent="#accordion-menu">
                    <div class="card-body align-center-vh">
                        @if(count($lihat_requests2) > 0)
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
                                            <th>Versi Iklan</th>
                                            <th>Periode Tayang</th>
                                            <th>Kategori</th>
                                            <th>AE</th>
                                            <th>Tanggal Konfirmasi</th>
                                            <th>Status Order</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lihat_requests2 as $request)
                                            <tr>
                                                <td>{{$request->id_order_iklan}}</td>
                                                <td>{{ \Carbon\Carbon::parse($request->tanggal_request)->translatedFormat('l, j F Y') }}</td>
                                                <td>{{$request->nama_jenis_iklan}}</td>
                                                <td>{{$request->nama_client}}</td>
                                                <td>{{$request->nama_produk}}</td>
                                                <td>{{$request->versi_iklan}}</td>
                                                <td>{{$request->priode_awal . " s.d. " . $request->priode_akhir}}</td>
                                                <td>{{$request->nama_kategori}}</td>
                                                <td>{{$request->name}}</td>
                                                <td>{{ \Carbon\Carbon::parse($request->tanggal_konfirmasi)->translatedFormat('l, j F Y') }}</td>
                                                <td>
                                                    <a type="button" href="/lihatpermintaan/{{$request->id_order_iklan}}"
                                                       class="btn btn-primary">{{$request->status_order}}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger" style="width: 100%">
                                Data tidak tersedia!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
