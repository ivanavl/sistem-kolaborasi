@extends('layouts.app')

@section('content')
    <div>
    <h3>Jadwal {{$request->tanggal_jadwal}}</h3>
    </div>
    <div>
        @if($request->jenis_iklan == 1)
            @if(isset($jadwal_final))
            <table>
                <thead>
                    <tr>
                        <th>Jenis Iklan</th>
                        <th>Jam</th>
                        <th>Nama Produk</th>
                        <th>Versi</th>
                        <th>Kategori</th>
                        <th>Priode Tayang</th>
                        <th>Kategori</th>
                        <th>No Order</th>
                        <th>AE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal_final as $jadwal)
                    <tr>
                        <td>{{$jadwal->nama_jenis_iklan}}</td>
                        <td>{{$jadwal->jam_jadwal}}</td>
                        @if($jadwal->status_order == 'Confirmed')
                            <td>{{$jadwal->nama_produk}}</td>
                            <td>{{$jadwal->versi_iklan}}</td>
                            <td>{{$jadwal->nama_kategori}}</td>
                            @if(is_null($jadwal->priode_awal))
                                <td></td>
                            @else
                                <td>{{$jadwal->priode_awal}} - {{$jadwal->priode_akhir}}</td>
                            @endif
                            <td>{{$jadwal->nama_kategori}}</td>
                            <td>{{$jadwal->id_order_iklan}}</td>
                            <td>{{$jadwal->name}}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        @else
            @if(isset($jadwal_final))
            <table>
                <thead>
                    <tr>
                        <th>Jenis Iklan</th>
                        <th>Jam</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Priode Tayang</th>
                        <th>No Order</th>
                        <th>AE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal_final as $jadwal)
                    <tr>
                        <td>{{$jadwal->nama_jenis_iklan}}</td>
                        <td>{{$jadwal->jam_jadwal}}</td>
                        @if($jadwal->status_order == 'Confirmed')
                            <td>{{$jadwal->nama_produk}}</td>
                            <td>{{$jadwal->kategori}}</td>
                            @if(is_null($jadwal->priode_awal))
                                <td></td>
                            @else
                                <td>{{$jadwal->priode_awal}} - {{$jadwal->priode_akhir}}</td>
                            @endif
                            <td>{{$jadwal->id_order_iklan}}</td>
                            <td>{{$jadwal->name}}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        @endif
    </div>
@endsection