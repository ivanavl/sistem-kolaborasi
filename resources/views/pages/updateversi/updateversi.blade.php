@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="row justify-content-center full-height">
            <div class="col-md-12">
                <div class="card full">
                    <div class="card-header">Pendaftaran Iklan</div>

                    {{ Form::open(['action' => 'OrderIklanController@storeorder', 'menthod' => 'POST']) }}
                    <div class="card-body align-center-vh">
                        @if(isset($lihat_order))
                            @foreach($lihat_order as $result)
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="col-form-label">No Order</label>
                                        </div>
                                        <div class="col-9">
                                            <label class="col-form-label">{{$result->id_order_iklan}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="col-form-label">Nama Client</label>
                                        </div>
                                        <div class="col-9">
                                            <label class="col-form-label">{{$result->nama_client}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="col-form-label">Nama Produk</label>
                                        </div>
                                        <div class="col-9">
                                            <label class="col-form-label">{{$result->nama_produk}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="col-form-label">Jenis Iklan</label>
                                        </div>
                                        <div class="col-9">
                                            <label class="col-form-label">{{$result->nama_jenis_iklan}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="col-form-label">Kategori</label>
                                        </div>
                                        <div class="col-9">
                                            <label class="col-form-label">{{$result->nama_kategori}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="col-form-label">AE</label>
                                        </div>
                                        <div class="col-9">
                                            <label class="col-form-label">{{$result->name}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="versi_iklan" class="col-form-label">Versi</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="versi_iklan">
                                            <input type="hidden" class="form-control" name=id_order_iklan"
                                                   value="{{$result->id_order_iklan}}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="card-footer">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection