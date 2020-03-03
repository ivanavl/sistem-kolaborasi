@extends('layout.app')

@section('content')
    <div>
        <div>
            <h3>Buat Template Baru</h3>
            <a href="/buattemplatejadwal">Buat template jadwal</a>
            {{ Form::open(['menthod' => 'POST']) }}
                {{Form::Label('waktu_tayang', 'Waktu Tayang')}}
                {{Form::time('waktu_tayang')}}
                {{Form::Label('jumlah_iklan', 'Jumlah Iklan')}}
                {{Form::text('email')}}
                {{Form::submit('ADD')}}
            {{ Form::close() }}
        </div>
        <div>
            <h4>Jadwal Dibuat</h4>
            <ul>
                <li></li>
            <ul>
        </div>
    </div>
@endsection