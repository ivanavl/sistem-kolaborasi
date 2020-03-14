@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h3>Buat Template Baru</h3>
            <a href="/lihattemplate">Lihat template jadwal</a>
            {{ Form::open(['action' => 'TemplateJadwalController@tempstoretemplate', 'menthod' => 'POST']) }}
                {{Form::Label('jam_awal', 'Jam Awal')}}
                {{Form::time('jam_awal')}}
                {{Form::Label('durasi_template', 'Durasi Segmen Iklan')}}
                {{Form::text('durasi_template')}}
                {{Form::submit('ADD')}}
            {{ Form::close() }}
        </div>
        <div>
            <h4>Jadwal Dibuat</h4>
            @if(Session::has('template'))
            <table>
                @foreach(Session::get('template') as $t)
                    <tr>
                        <td><a  href="/removesegmen/{{$t->get('jam_awal')}}">X</a></td>
                        <td>{{$t->get('jam_awal')}}</td>
                        <td>{{$t->get('durasi_template')}}</td>
                    </tr>
                @endforeach
            </table>
            @endif
        </div>
        {{ Form::open(['action' => 'TemplateJadwalController@storetemplate','menthod' => 'POST']) }}
            {{Form::Label('nama_template', 'Nama Template')}}
            {{Form::text('nama_template')}}
        {{Form::submit('CREATE')}}
        {{ Form::close() }}
    </div>
@endsection