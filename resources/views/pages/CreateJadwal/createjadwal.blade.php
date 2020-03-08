@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h3>Create Jadwal - Spot Iklan</h3>
            <a href="/lihattemplate">Lihat Template</a>
        </div>
        <div>
            {{ Form::open(['action' => 'JadwalTrafficIklanController@storejadwal', 'method' => 'POST']) }}
                <div class="form-group">
                    {{Form::Label('tanggal_jadwal', 'Tanggal Jadwal')}}
                    {{Form::date('tanggal_awal')}}
                    {{Form::date('tanggal_akhir')}}
                    <br>
                    {{Form::Label('template_jadwal', 'Template Jadwal')}}
                    {{Form::select('template_jadwal', $template_jadwals1, '1')}}
                </div>
                {{Form::hidden('jenis_iklan', 1)}}
                {{Form::submit('CREATE')}}
            {{ Form::close() }}
        </div>
    </div>
    <br>
    <div>
        <div>
            <h3>Create Jadwal - Talkshow</h3>
        </div>
        <div>
            {{ Form::open(['action' => 'JadwalTrafficIklanController@storejadwal', 'menthod' => 'POST']) }}
                <div class="form-group">
                    {{Form::Label('tanggal_jadwal', 'Tanggal Jadwal')}}<br>
                    {{Form::date('tanggal_awal')}}
                    {{Form::date('tanggal_akhir')}}
                    <br>
                    <br>
                    {{Form::Label('template_jadwal', 'Template Jadwal')}}
                    {{Form::select('template_jadwal', $template_jadwals2, '1')}}
                    {{-- harusnya di hide kalau ga selectnya ga BAT --}}
                    {{Form::time('jam_jadwal')}}
                </div>
                {{Form::hidden('jenis_iklan', 2)}}
                {{Form::submit('CREATE')}}
            {{ Form::close() }}
        </div>
    </div>
@endsection