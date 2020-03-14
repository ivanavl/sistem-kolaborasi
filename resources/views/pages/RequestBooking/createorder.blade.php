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
                @if(isset($clients))
                {{Form::label($clients->nama_client)}}
                {{Form::hidden('id_client', $clients->id_client)}}
                @endif
                <br>
                @if(isset($collection))
                    {{Form::Label('kategori', 'Kategori')}}
                    {{Form::label($collection->get('kategori'))}}
                    <br>
                    {{Form::Label('jenis_iklan', 'Jenis Iklan')}}
                    {{Form::label($collection->get('jenis_iklan'))}}
                    <br>
                    {{Form::Label('jumlah_tayang', 'Jumlah Tayang')}}
                    {{Form::label($collection->get('jumlah_tayang'))}}
                    <br>
                    {{Form::Label('priode_tayang', 'Priode Tayang')}}
                    {{Form::label($collection->get('priode_awal').' - '.$collection->get('priode_akhir'))}}
                    <br>
                @endif
                {{Form::submit('REQUEST')}}
            {{ Form::close() }}
        </div>
    </div>
@endsection