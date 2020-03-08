@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h3>Pendaftaran Iklan</h3>
        </div>
        <div>
            {{ Form::open(['action' => 'OrderIklanController@storeorder', 'menthod' => 'POST']) }}
                {{Form::Label('nama_produk', 'Nama Produk')}}
                {{Form::text('nama_produk')}}
                <br>
                {{Form::Label('nama_client', 'Nama Client')}}
                {{Form::text('nama_produk')}}
                <br>
                {{Form::Label('kategori', 'Kategori')}}
                {{Form::text('nama_produk')}}
                <br>
                {{Form::Label('jenis_iklan', 'Jenis Iklan')}}
                {{Form::text('nama_produk')}}
                <br>
                {{Form::Label('jumlah_tayang', 'Jumlah Tayang')}}
                {{Form::text('nama_produk')}}
                <br>
                {{Form::Label('priode_tayang', 'Priode Tayang')}}
                {{Form::text('nama_produk')}}
                <br>
                {{Form::submit('REQUEST')}}
            {{ Form::close() }}
        </div>
    </div>
@endsection