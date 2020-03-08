@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h3>List Template</h3>
            <a href="/createtemplate">Buat template jadwal</a>
            {{ Form::open(['action' => 'TemplateJadwalcontroller@showtemplate','menthod' => 'POST']) }}
                {{Form::Label('nama_template', 'Nama Template')}}
                {{Form::select('template_jadwal', $template_jadwals, '1')}}
                {{Form::submit('SEARCH')}}
            {{ Form::close() }}
        </div>
        <div>
        <h4>Template Jadwal</h4>
            @if(isset($isi_templates))
            <table>
                <thead>
                    <tr>
                        <th>Jam Awal</th>
                        <th>Durasi Segmen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($isi_templates as $result)
                    <tr>
                        <td>{{$result->jam_awal}}</td>
                        <td>{{$result->durasi_template}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@endsection