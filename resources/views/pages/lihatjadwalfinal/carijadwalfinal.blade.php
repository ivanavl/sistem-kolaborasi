@extends('layouts.app')

@section('content')
    <div><h3>Lihat Jadwal Final</h3></div>
    <div>
        {{ Form::open(['action'=> 'JadwalTrafficIklanController@showjadwalfinal', 'method' => 'POST']) }}
                    {{Form::Label('jenis_iklan', 'Jenis Iklan')}}
                    {{Form::radio('jenis_iklan', '1', true)}}Spot Iklan
                    {{Form::radio('jenis_iklan', '2')}}Talkshow
                    <br>
                    {{Form::Label('tanggal_jadwal', 'Tanggal')}}
                    {{Form::date('tanggal_jadwal')}}
                    <br>
                {{Form::submit('SEARCH')}}
            {{ Form::close() }}
    </div>
@endsection