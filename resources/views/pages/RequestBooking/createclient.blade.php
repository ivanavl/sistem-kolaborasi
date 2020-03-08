@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h3>Pendaftaran Client</h3>
            <a href="/lihatclient">Client sudah terdaftar</a>
        </div>
        <div>
            {{ Form::open(['action' => 'ClientController@storeclient', 'menthod' => 'POST']) }}
                {{Form::Label('nama_client', 'Nama Client')}}
                {{Form::text('nama_client')}}
                <br>
                {{Form::Label('alamat_client', 'Alamat')}}
                {{Form::textarea('alamat_client')}}
                <br>
                {{Form::Label('npwp_client', 'NPWP')}}
                {{Form::text('npwp_client')}}
                <br>
                {{Form::Label('contact_person', 'Contact Person')}}
                {{Form::text('contact_person')}}
                <br>
                {{Form::Label('telepon_client', 'Telepon')}}
                {{Form::text('telepon_client')}}
                <br>
                {{Form::Label('email_client', 'Email')}}
                {{Form::text('email_client')}}
                <br>
                {{Form::submit('CREATE')}}
            {{ Form::close() }}
        </div>
    </div>
@endsection