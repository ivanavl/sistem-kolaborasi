@extends('layouts.app')

@section('content')
    <div>
        <h3>Lihat Request<h3>
    </div>
    <div>
        @if(isset($lihat_requests))
        <table>
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
                    <td>{{$request->priode_awal}} - {{$request->priode_akhir}}</td>
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
        @endif
    </div>
@endsection