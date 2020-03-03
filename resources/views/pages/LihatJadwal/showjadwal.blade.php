@extends('layout.app')

@section('content')
    <div>
        <h3>Jadwal Traffic Iklan</h3>
        {{ Form::open(['action' => 'JadwalTrafficIklanController@store', 'method' => 'POST']) }}
            {{Form::date('tanggal_jadwal')}}
    {{ Form::close() }}
    </div>
@endsection