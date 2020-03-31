@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="row justify-content-center full-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Pencarian Iklan</div>
                    {{ Form::open(['action' => 'OrderIklanController@searchorder','menthod' => 'POST']) }}
                    <div class="card-body align-center-vh">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label for="nama_client" class="col-form-label">Nama Client</label>
                                </div>
                                <div class="col-7">
                                    <input class="form-control" name="search" type="text" placeholder="input nama client/alamat/contact person">
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
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No Order</th>
                                        <th>Tanggal Request</th>
                                        <th>Jenis Iklan</th>
                                        <th>Nama Client</th>
                                        <th>Nama Produk</th>
                                        <th>Priode Tayang</th>
                                        <th>Tanggal Konfirmasi</th>
                                        <th>Versi Iklan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lihat_orders as $order)
                                        <tr>
                                            <td>{{$order->id_order_iklan}}</td>
                                            <td>{{$order->tanggal_request}}</td>
                                            <td>{{$order->nama_jenis_iklan}}</td>
                                            <td>{{$order->nama_client}}</td>
                                            <td>{{$order->nama_produk}}</td>
                                            <td>{{$order->priode_awal . " s.d. " . $order->priode_akhir}}</td>
                                            <td>{{$order->tanggal_konfirmasi}}</td>
                                            @if(is_null($order->versi_iklan))
                                                <td><input type="button" href="/updateversi/{{$order->id_order_iklan}}" class="btn btn-primary" value="Belum ada versi iklan">
                                                </td>
                                            @else
                                                <td><a href="/updateversi/{{$order->id_order_iklan}}">
                                                        {{$order->versi_iklan}}
                                                    </a></td>
                                            @endif
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