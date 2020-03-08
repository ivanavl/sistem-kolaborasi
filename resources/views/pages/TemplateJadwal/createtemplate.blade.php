@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h3>Buat Template Baru</h3>
            <a href="/lihattemplate">Lihat template jadwal</a>
            {{ Form::open(['menthod' => 'POST']) }}
                {{Form::Label('waktu_tayang', 'Waktu Tayang')}}
                {{Form::time('waktu_tayang')}}
                {{Form::Label('durasi_template', 'Durasi Segmen Iklan')}}
                {{Form::text('email')}}
                {{Form::submit('ADD')}}
        </div>
        <div>
            <h4>Jadwal Dibuat</h4>
            @if(isset($waktu_tayang))
            <ul>
                {{$n = 0}}
            @foreach($waktu_tayang as $waktu)
            @foreach($durasi_template as $durasi)
                <li>{{$waktu}} - {{$durasi}}</li>
                {{Form::hidden('waktu'.$n, $waktu)}}
                {{Form::hidden('durasi'.$n, $durasi)}}
                {{$n++}}
            @endforeach
            @endforeach
            {{Form::hidden('n', $n)}}
            </ul>
            @endif
        </div>
        {{ Form::close() }}
    </div>
@endsection