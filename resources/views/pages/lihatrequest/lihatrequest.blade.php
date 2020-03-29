@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="row justify-content-center full-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lihat Request</div>
                    @if(isset($lihat_requests))
                        <div class="card-body align-center-vh">
                            <div class="content-width">
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
                                    @foreach($lihat_requests as $request)
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
                                            <td><a href="/lihatrequestdetail/{{$request->id_order_iklan}}">
                                                    {{$request->status_order}}
                                                </a></td>
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