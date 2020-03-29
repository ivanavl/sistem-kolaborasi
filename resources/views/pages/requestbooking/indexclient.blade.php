@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h3>Pencarian Client</h3>
            <a href="/createclient">Client belum terdaftar</a>
            {{ Form::open(['action' => 'ClientController@searchclient','menthod' => 'POST']) }}
                {{Form::text('search', null,['placeholder' => 'input nama client/alamat/contact person'])}}
                {{Form::submit('SEARCH')}}
            {{ Form::close() }}
        </div>
        <div>
            @if(isset($clients))
            <table>
                <thead>
                    <tr>
                        <th>Id Client</th>
                        <th>Nama Client</th>
                        <th>Alamat Client</th>
                        <th>Contact Person</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{$client->id_client}}</td>
                        <td>{{$client->nama_client}}</td>
                        <td>{{$client->alamat_client}}</td>
                        <td>{{$client->contact_person}}</td>
                        <td><a href="/pilihclient/{{$client->id_client}}">
                            Pilih Client
                        </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@endsection