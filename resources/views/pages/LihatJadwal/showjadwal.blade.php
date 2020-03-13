@extends('layouts.app')

@section('content')
    <div>
        <h3>Jadwal Traffic Iklan</h3>
        {{ Form::open(['action' => 'JadwalTrafficIklanController@showjadwalresult', 'method' => 'POST']) }}
            {{Form::Label('jenis_iklan', 'Jenis Iklan')}}
            {{Form::radio('jenis_iklan', 'spot iklan', true)}}Spot Iklan
            {{Form::radio('jenis_iklan', 'talkshow')}}Talkshow
            <br>
            {{Form::date('tanggal_jadwal')}}
            {{Form::submit('SEARCH')}}
        {{ Form::close() }}
    </div>
    <div>
        @if(isset($request))
        <p>Hasil Pencarian untuk {{$request->jenis_iklan}} pada tanggal {{$request->tanggal_jadwal}}</p>
        @endif
        
        @if(isset($results))
        <table>
            <thead>
                <tr>
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
                    <td>{{$result->jam_jadwal}}</td>
                    <td>{{$result->nama_produk}}</td>
                    <td>{{$result->versi_iklan}}</td>
                    <td>{{$result->nama_kategori}}</td>
                    @if($result->priode_awal != null)
                        <td>{{$result->priode_awal}} - {{$result->priode_akhir}}</td>
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
        @endif
    <div>
@endsection