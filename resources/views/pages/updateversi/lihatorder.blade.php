@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Order</div>
                {{ Form::open(['action' => 'OrderIklanController@searchorder','menthod' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="nama_client" class="col-form-label">Cari Order</label>
                            </div>
                            <div class="col-7">
                                <input class="form-control" name="search" type="text"
                                       placeholder="input nama client/alamat/contact person">
                            </div>
                            <div class="col-2">
                                <input class="btn btn-primary" type="submit" value="Search">
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
                @if(isset($lihat_orders[0]))
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
                                        <th>Versi Iklan</th>
                                        <th>Perbarui</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lihat_orders as $order)
                                        <tr>
                                            <td>{{$order->id_order_iklan}}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->tanggal_request)->translatedFormat('l, j F Y') }}</td>
                                            <td>{{$order->nama_jenis_iklan}}</td>
                                            <td>{{$order->nama_client}}</td>
                                            <td>{{$order->nama_produk}}</td>
                                            <td>{{\Carbon\Carbon::parse($order->priode_awal)->translatedFormat('l, j F Y') . " s.d. " . \Carbon\Carbon::parse($order->priode_akhir)->translatedFormat('l, j F Y')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->tanggal_konfirmasi)->translatedFormat('l, j F Y') }}</td>
                                            <td>{{$order->versi_iklan}}</td>
                                            <td>
                                                <a type="button" href="/perbaruiversi/{{$order->id_order_iklan}}"
                                                   class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            </td>
                                            {{-- @if(is_null($order->versi_iklan))

                                            @else
                                                <td><a href="/updateversi/{{$order->id_order_iklan}}">
                                                        {{$order->versi_iklan}}
                                                    </a></td>
                                            @endif --}}
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
