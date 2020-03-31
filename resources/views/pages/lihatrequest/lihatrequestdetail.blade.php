@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lihat Request</div>
                @if(isset($lihat_request))
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            <div class="table-container">
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Jenis Iklan</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lihat_request as $request)
                                        <tr>
                                            <td>{{$request->nama_jenis_iklan}}</td>
                                            <td>{{$request->tanggal_jadwal}}</td>
                                            <td>{{$request->jam_jadwal}}</td>
                                            <td>{{$request->nama_produk}}</td>
                                            <td>{{$request->nama_kategori}}</td>
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