@extends('layout.app')

@section('content')
    <div><h3>Cari Jadwal Kosong</h3></div>
    <div>
        {{ Form::open(['method' => 'PUT']) }}
                    {{Form::Label('jenis_iklan', 'Jenis Iklan')}}
                    {{Form::radio('jenis_iklan', 'Spot Iklan', true)}}Spot Iklan
                    {{Form::radio('jenis_iklan', 'Talkshow')}}Talkshow
                    <br>
                    {{Form::Label('kategori', 'Kategori Jadwal')}}
                    {{Form::select('template_jadwal', $waktu_tayang)}}
                    <br>
                    {{Form::Label('jumlah_tayang', 'Jumlah Tayang')}}
                    {{Form::text('jumlah_tayang')}}
                    <br>
                    {{Form::Label('priode_tayang', 'Priode Tayang')}}
                    {{Form::date('priode_awal')}}
                    {{Form::date('priode_akhir')}}
                    <br>
                    {{Form::Label('waktu_tayang', 'Waktu Tayang')}}
                    @foreach($waktu_tayang as $wt)
                    {{Form::checkbox('watku_tayang', $wt)}}{{$wt}}
                    @endforeach
                    <br>
                {{Form::submit('SEARCH')}}
            {{ Form::close() }}
    </div>
@endsection