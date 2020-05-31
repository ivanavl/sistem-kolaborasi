@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card full">
                <div class="card-header">Konfirmasi Pemesanan</div>
                <div class="card-body align-center-vh">
                    @if(isset($result1, $result2))
                        @foreach($result1 as $result_1)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label">No Order</label>
                                    </div>
                                    <div class="col-9">
                                        <label class="col-form-label">{{$result_1->id_order_iklan}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label">Nama Klien</label>
                                    </div>
                                    <div class="col-9">
                                        <label class="col-form-label">{{$result_1->nama_client}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label">Nama Produk</label>
                                    </div>
                                    <div class="col-9">
                                        <label class="col-form-label">{{$result_1->nama_produk}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label">Jenis Iklan</label>
                                    </div>
                                    <div class="col-9">
                                        <label class="col-form-label">{{$result_1->nama_jenis_iklan}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label">Kategori</label>
                                    </div>
                                    <div class="col-9">
                                        <label class="col-form-label">{{$result_1->nama_kategori}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label">Jumlah Tayang</label>
                                    </div>
                                    <div class="col-9">
                                        <label class="col-form-label">{{$result_1->jumlah_tayang}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="col-form-label">Jadwal Tayang</label>
                                    </div>
                                    <div class="col-9">
                                        @foreach ($result2 as $result_2)
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="col-form-label">{{ \Carbon\Carbon::parse($result_2->tanggal_jadwal)->translatedFormat('l, j F Y') }}</label>
                                                </div>
                                                <div class="col-6">
                                                    <label class="col-form-label">{{$result_2->jam_jadwal}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            {{ Form::open(['action' => 'OrderIklanController@konfirmasibooking','menthod' => 'POST']) }}
                            {{Form::hidden('konfirmasi', 1)}}
                            {{Form::hidden('id_order_iklan', $result_1->id_order_iklan)}}
                            <input class="btn btn-primary" type="submit" value="Konfirmasi Pesanan">
                            {{ Form::close() }}
                        </div>
                        <div class="col">
                            {{ Form::open(['action' => 'OrderIklanController@konfirmasibooking','menthod' => 'POST']) }}
                            {{Form::hidden('konfirmasi', 0)}}
                            {{Form::hidden('id_order_iklan', $result_1->id_order_iklan)}}
                            <input class="btn btn-primary" type="submit" value="Batalkan Pesanan">
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
