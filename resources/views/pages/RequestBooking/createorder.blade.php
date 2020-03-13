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
                @if(isset($clients))y
                {{Form::label($clients->nama_client)}}
                {{Form::hidden($clients->id_client)}}
                @endif
                <br>
                @if(isset($order_detail))
                {{Form::Label('kategori', 'Kategori')}}
                {{Form::label($order_detail->id_kategori)}}
                <br>
                {{Form::Label('jenis_iklan', 'Jenis Iklan')}}
                {{Form::label($order_detail->id_jenis_iklan)}}
                <br>
                {{Form::Label('jumlah_tayang', 'Jumlah Tayang')}}
                {{Form::label($order_detail->jumlah_tayang)}}
                @endif
                <br>
                {{Form::Label('priode_tayang', 'Priode Tayang')}}
                {{Form::label($order_detail->tanggal_awal.' - '.$order_detail->tanggal_akhir)}}
                <br>
                {{Form::submit('REQUEST')}}
            {{ Form::close() }}
        </div>
    </div>
@endsection