@extends('layouts.app')

@section('content')
    <div>

    </div>
    <div>
        <h3>Jadwal Tersedia:</h3>
        {{ Form::open(['action' => 'JadwalTrafficIklanController@keepjadwal', 'method' => 'POST']) }}
        @if(isset($result))
            @foreach($result as $k => $v)
                <h4>{{$k}}: Tersedia {{$resultCount[$k][0]->total}} slot</h4>
                @foreach($v as $data)
                    {{-- {{$data->jam_jadwal}} --}}
                    {{Form::checkbox('jadwal[]', $data->id_jadwal)}}{{$data->jam_jadwal}}
                    <t/>
                @endforeach
            @endforeach
        @endif

        <br>
        <br>
        <h3>Jadwal Alternatif:</h3>
        @if(isset($resultAlt))
            @foreach($resultAlt as $k => $v)
                <h4>{{$k}}: Tersedia {{$resultAltCount[$k][0]->total}} slot</h4>
                @foreach($v as $data)
                    {{-- {{$data->jam_jadwal}} --}}
                    {{Form::checkbox('jadwal[]', $data->id_jadwal)}}{{$data->jam_jadwal}}
                    <t/>
                @endforeach
            @endforeach
        @endif
        <br>
        {{Form::submit('REQUEST')}}
        {{ Form::close() }}
    </div>
@endsection