@extends('layouts.app')

@section('content')
    <div><h3>Cari Jadwal Kosong</h3></div>
    <div>
        {{ Form::open(['action'=> 'JadwalTrafficIklanController@carijadwalresult', 'method' => 'POST']) }}
            {{Form::Label('jenis_iklan', 'Jenis Iklan')}}
            {{Form::radio('jenis_iklan', '1', true)}}Spot Iklan
            {{Form::radio('jenis_iklan', '2')}}Talkshow
            <br>
            {{Form::Label('kategori', 'Kategori Jadwal')}}
            {{Form::select('id_kategori', $kategoris)}}
            <br>
            {{Form::Label('jumlah_tayang', 'Jumlah Tayang')}}
            {{Form::text('jumlah_tayang')}}
            <br>
            {{Form::Label('priode_tayang', 'Priode Tayang')}}
            {{Form::date('priode_awal')}}
            {{Form::date('priode_akhir')}}
            <br>
            {{Form::Label('waktu_tayang', 'Waktu Tayang')}}
            {{Form::checkbox('waktu_tayang[]', '1')}}04:00-06:00
            {{Form::checkbox('waktu_tayang[]', '2')}}06:00-10:00
            {{Form::checkbox('waktu_tayang[]', '3')}}10:00-14:00
            {{Form::checkbox('waktu_tayang[]', '4')}}14:00-18:00
            {{Form::checkbox('waktu_tayang[]', '5')}}18:00-23.00
            <br>
            {{Form::submit('SEARCH')}}
        {{ Form::close() }}
    </div>
@endsection