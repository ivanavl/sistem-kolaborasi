@extends('layouts.app')

@section('content')
    <div class="row justify-content-center h-75">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lihat Request Belum Terkonfirmasi</div>
                @if(isset($lihat_requests1))
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            <div class="table-container">
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No Order</th>
                                        <th>Tanggal Request</th>
                                        <th>Jenis Iklan</th>
                                        <th>Nama Client</th>
                                        <th>Nama Produk</th>
                                        <th>Versi Iklan</th>
                                        <th>Priode Tayang</th>
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
                                            <td>{{$request->tanggal_request}}</td>
                                            <td>{{$request->nama_jenis_iklan}}</td>
                                            <td>{{$request->nama_client}}</td>
                                            <td>{{$request->nama_produk}}</td>
                                            <td>{{$request->versi_iklan}}</td>
                                            <td>{{$request->priode_awal . " s.d. " . $request->priode_akhir}}</td>
                                            <td>{{$request->nama_kategori}}</td>
                                            <td>{{$request->name}}</td>
                                            <td>{{$request->tanggal_konfirmasi}}</td>
                                            <td>
                                                <a type="button" href="/lihatrequestdetail/{{$request->id_order_iklan}}"
                                                   class="btn btn-primary">{{$request->status_order}}</a>
                                            </td>
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
    <div class="row justify-content-center h-75">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lihat Request Terkonfirmasi</div>
                @if(isset($lihat_requests2))
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            <div class="table-container">
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No Order</th>
                                        <th>Tanggal Request</th>
                                        <th>Jenis Iklan</th>
                                        <th>Nama Client</th>
                                        <th>Nama Produk</th>
                                        <th>Versi Iklan</th>
                                        <th>Priode Tayang</th>
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
                                            <td>{{$request->tanggal_request}}</td>
                                            <td>{{$request->nama_jenis_iklan}}</td>
                                            <td>{{$request->nama_client}}</td>
                                            <td>{{$request->nama_produk}}</td>
                                            <td>{{$request->versi_iklan}}</td>
                                            <td>{{$request->priode_awal . " s.d. " . $request->priode_akhir}}</td>
                                            <td>{{$request->nama_kategori}}</td>
                                            <td>{{$request->name}}</td>
                                            <td>{{$request->tanggal_konfirmasi}}</td>
                                            <td>
                                                <a type="button" href="/lihatrequestdetail/{{$request->id_order_iklan}}"
                                                   class="btn btn-primary">{{$request->status_order}}</a>
                                            </td>
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