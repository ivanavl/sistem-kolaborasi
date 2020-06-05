@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-12">Jadwal Akhir
                        @if($request->jenis_iklan == 0)
                            Semua Iklan
                        @elseif($request->jenis_iklan == 1)
                            Spot Iklan
                        @elseif($request->jenis_iklan == 2)
                            Talkshow
                        @elseif($request->jenis_iklan == 3)
                            Ads Lips
                        @endif
                        {{ \Carbon\Carbon::parse($request->tanggal_jadwal)->translatedFormat('l, j F Y') }}
                    </div>
                </div>
                @if(isset($request))
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            <div class="table-container">
                                @if(isset($jadwal_final))
                                    <table class="table table-striped table-custom table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Jam</th>
                                            @if($request->jenis_iklan == 0)
                                                <th>Jenis Iklan</th>
                                            @endif
                                            <th>Nama Produk</th>
                                            @if($request->jenis_iklan == 1 || $request->jenis_iklan == 0)
                                                <th>Versi</th>
                                            @endif
                                            <th>Kategori</th>
                                            <th>Periode Tayang</th>
                                            <th>No Order</th>
                                            <th>AE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($jadwal_final as $jadwal)
                                            <tr>
                                                <td>{{$jadwal->jam_jadwal}}</td>
                                                @if($request->jenis_iklan == 0)
                                                    <td>{{$jadwal->nama_jenis_iklan}}</td>
                                                @endif
                                                @if($jadwal->status_order == 'Confirmed')
                                                    <td>{{$jadwal->nama_produk}}</td>
                                                    @if($request->jenis_iklan == 1 || $request->jenis_iklan == 0)
                                                        <td>{{$jadwal->versi_iklan}}</td>
                                                    @endif
                                                    <td>{{$jadwal->nama_kategori}}</td>
                                                    @if(is_null($jadwal->priode_awal))
                                                        <td></td>
                                                    @else
                                                        <td>{{\Carbon\Carbon::parse($jadwal->priode_awal)->translatedFormat('l, j F Y') . " - " . \Carbon\Carbon::parse($jadwal->priode_akhir)->translatedFormat('l, j F Y') }}</td>
                                                    @endif
                                                    <td>{{$jadwal->id_order_iklan}}</td>
                                                    <td>{{$jadwal->name}}</td>
                                                @else
                                                    <td></td>
                                                    @if($request->jenis_iklan == 1 || $request->jenis_iklan == 0)
                                                        <td></td>
                                                    @endif
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card-footer">
                    {{ Form::open(['action' => 'JadwalTrafficIklanController@exportjadwal','menthod' => 'POST']) }}
                    {{Form::hidden('tanggal_jadwal', $request->tanggal_jadwal)}}
                    {{Form::hidden('jenis_iklan', $request->jenis_iklan)}}
                    <input class="btn btn-primary" type="submit" value="Cetak">
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
