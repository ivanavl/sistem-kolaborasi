@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Template</div>
                {{ Form::open(['action' => 'OrderIklanController@searchrequest','method' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="nama_client" class="col-form-label">Nama Client</label>
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
                @if(isset($lihat_requests[0]))
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
                                        <th>Priode Tayang</th>
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
                                            <td>{{$request->priode_awal . " s.d. " . $request->priode_akhir}}</td>
                                            <td>{{$request->tanggal_konfirmasi}}</td>
                                            @if($request->status_order == 'Requested')
                                                <td>
                                                    <a type="button"
                                                       href="/konfirmasibooking/{{$request->id_order_iklan}}"
                                                       class="btn btn-primary">{{$request->status_order}}</a>
                                                </td>
                                            @else
                                                <td>{{$request->status_order}}</td>
                                            @endif
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