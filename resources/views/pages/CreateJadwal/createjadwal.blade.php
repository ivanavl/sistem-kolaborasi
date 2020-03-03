@extends('layout.app')

@section('content')
    <div>
        <div>
            <h3>Create Jadwal - Spot Iklan</h3>
            <a href="/viewtemplate">Lihat Template</a>
        </div>
        <div>
            {{ Form::open(['action' => 'JadwalTrafficIklanController@store', 'method' => 'POST']) }}
                <div class="form-group">
                    {{Form::Label('tanggal_jadwal', 'Tanggal Jadwal')}}
                    {{Form::date('tanggal_awal')}}
                    {{Form::date('tanggal_akhir')}}
                    {{Form::checkbox('jadwal_satu_hari', 'value')}}<p>Jadwal satu hari</p>
                    <br>
                    {{Form::Label('template_jadwal', 'Template Jadwal')}}
                    {{Form::select('template_jadwal', $template_jadwals, '1')}}
                </div>
                {{Form::hidden('jenis_iklan', 'Spot iklan')}}
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
            {{ Form::open(['action' => 'JadwalTrafficIklanController@create', 'menthod' => 'POST']) }}
                <div class="form-group">
                    {{Form::Label('tanggal_jadwal', 'Tanggal Jadwal')}}<br>
                    {{Form::date('tanggal')}}
                    <br>
                    {{Form::Label('jam_jadwal', 'Jam Jadwal')}}<br>
                    {{Form::time('time')}}
                </div>
                {{Form::hidden('jenis_iklan', 'Talkshow')}}
                {{Form::submit('CREATE')}}
            {{ Form::close() }}
        </div>
    </div>
@endsection