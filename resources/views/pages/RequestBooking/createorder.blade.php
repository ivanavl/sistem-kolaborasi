@extends('layout.app')

@section('content')
    <div>
        <div>
            <h3>Pendaftaran Iklan</h3>
            <a href="/buattemplatejadwal">Client sudah terdaftar</a>
        </div>
        <div>
            {{ Form::open(['action' => 'ClientController@store', 'menthod' => 'POST']) }}
                {{Form::Label('nama_produk', 'Nama Produk')}}
                {{Form::text('nama_produk')}}
                {{Form::submit('REQUEST')}}
            {{ Form::close() }}
        </div>
    </div>
@endsection