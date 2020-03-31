@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card full">
                <div class="card-header">Pendaftaran Iklan</div>

                {{ Form::open(['action' => 'OrderIklanController@storeorder', 'menthod' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="nama_produk" class="col-form-label">Nama Produk</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="nama_produk">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input class="btn btn-primary" type="submit" value="Search">
                </div>
            </div>
        </div>
    </div>
@endsection