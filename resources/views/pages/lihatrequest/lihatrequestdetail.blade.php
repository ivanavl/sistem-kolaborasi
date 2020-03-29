@extends('layouts.app')

@section('content')
    <div>
        <h3>Lihat Request<h3>
    </div>
    <div>
        @if(isset($lihat_request))
        <table>
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
        @endif
    </div>
@endsection