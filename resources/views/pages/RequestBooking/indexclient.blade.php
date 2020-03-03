@extends('layout.app')

@section('content')
    <div>
        <div>
            <h3>Pencarian Client</h3>
            <a href="/buattemplatejadwal">Client belum terdaftar</a>
            {{ Form::open(['action' => 'ClientController@store', 'menthod' => 'POST']) }}
                {{Form::text('search')}}
                {{Form::submit('SEARCH')}}
            {{ Form::close() }}
        </div>
        <div>
            <h4>Hasil Pencarian</h4>
        </div>
    </div>
@endsection