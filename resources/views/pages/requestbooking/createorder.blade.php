@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card full">
                <div class="card-header">Pendaftaran Order Iklan</div>

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
                                <label for="nama_client" class="col-form-label">Nama Klien</label>
                            </div>
                            @if(isset($client))
                                <div class="col-9">
                                    <label for="nama_client" class="col-form-label">{{ $client->nama_client }}</label>
                                    <input type="hidden" name="id_client" value="{{ $client->id_client }}">
                                </div>
                            @endif
                        </div>
                        @if(isset($collection))
                            <div class="row">
                                <div class="col-3">
                                    <label for="kategori" class="col-form-label">Kategori</label>
                                </div>
                                <div class="col-9">
                                    <label for="kategori"
                                           class="col-form-label">{{ $collection->get('kategori') }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="jenis_iklan" class="col-form-label">Jenis Iklan</label>
                                </div>
                                <div class="col-9">
                                    <label for="jenis_iklan"
                                           class="col-form-label">{{ $collection->get('jenis_iklan') }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="jumlah_tayang" class="col-form-label">Jumlah Tayang</label>
                                </div>
                                <div class="col-9">
                                    <label for="jumlah_tayang"
                                           class="col-form-label">{{ $collection->get('jumlah_tayang') }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="priode_tayang" class="col-form-label">Periode Tayang</label>
                                </div>
                                <div class="col-9">
                                    <label for="priode_tayang"
                                           class="col-form-label">{{\Carbon\Carbon::parse($collection->get('priode_awal')->translatedFormat('l, j F Y') . " s.d. " . \Carbon\Carbon::parse($collection->get('priode_akhir'))->translatedFormat('l, j F Y') }}</label>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <input class="btn btn-primary" type="submit" value="Pesan">
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
