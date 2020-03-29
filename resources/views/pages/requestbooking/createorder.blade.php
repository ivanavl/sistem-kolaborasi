@extends('layouts.app')

@section('content')
    <div class="container full-height">
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
                            <div class="row">
                                <div class="col-3">
                                    <label for="nama_client" class="col-form-label">Nama Client</label>
                                </div>
                                @if(isset($clients))
                                <div class="col-9">
                                    <label for="nama_client" class="col-form-label">{{ $clients->nama_client }}</label> name="nama_produk">
                                    <input type="hidden" name="id_client" value="{{ $clients->id_client }}">
                                </div>
                                @endif
                            </div>
                            @if(isset($collection))
                                <div class="row">
                                    <div class="col-3">
                                        <label for="kategori" class="col-form-label">Kategori</label>
                                    </div>
                                    <div class="col-9">
                                        <label for="kategori" class="col-form-label">{{ $collection->get('kategori') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="jenis_iklan" class="col-form-label">Jenis Iklan</label>
                                    </div>
                                    <div class="col-9">
                                        <label for="jenis_iklan" class="col-form-label">{{ $collection->get('jenis_iklan') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="jumlah_tayang" class="col-form-label">Jumlah Tayang</label>
                                    </div>
                                    <div class="col-9">
                                        <label for="jumlah_tayang" class="col-form-label">{{ $collection->get('jumlah_tayang') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="priode_tayang" class="col-form-label">Priode Tayang</label>
                                    </div>
                                    <div class="col-9">
                                        <label for="priode_tayang" class="col-form-label">{{ $collection->get('priode_awal') . " s.d. " . $collection->get('priode_akhir') }}</label>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <input class="btn btn-primary" type="submit" value="Search">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection