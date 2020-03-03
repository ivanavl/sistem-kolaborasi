@extends('layout.app')

@section('content')
    <div>
        <div>
            <h3>List Template</h3>
            <a href="/buattemplatejadwal">Buat template jadwal</a>
            {{ Form::open(['menthod' => 'POST']) }}
            {{-- 'action' => 'TemplateJadwalController@Show', --}}
                {{Form::Label('nama_template', 'Nama Template')}}
                {{Form::select('template_jadwal', $template_jadwals, '1')}}
                {{Form::submit('SEARCH')}}
            {{ Form::close() }}
        </div>
        <div>
            <h4>Template Jadwal</h4>
            <ul>
                {{-- @foreach ($isi_templates as $isi_template)
                    <li>{{$isi_template->jam_awal}},{{$isi_template->jumlah_iklan}}</li>
                @endforeach --}}
            <ul>
        </div>
    </div>
@endsection