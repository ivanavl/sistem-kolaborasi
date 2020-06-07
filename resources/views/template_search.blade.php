@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pencarian Client</div>

                {{ Form::open(['action' => 'ClientController@searchclient','menthod' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="nama_client" class="col-form-label">Nama Client</label>
                            </div>
                            <div class="col-7">
                                <input class="form-control" name="search" type="text"
                                       placeholder="input nama client/alamat/narahubung">
                            </div>
                            <div class="col-2">
                                <input class="btn btn-primary" type="submit" value="Search">
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
                @if(isset($clients))
                    <div class="card-body align-center-vh">
                        <div class="content-width">
                            <div class="table-container">
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr class="table-title">
                                        <th colspan="5">
                                            <h3>Hasil Pencarian</h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Client</th>
                                        <th>Alamat Client</th>
                                        <th>Narahubung</th>
                                        <th><i class="fas fa-check"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <th>{{$client->id_client}}</th>
                                            <td>{{$client->nama_client}}</td>
                                            <td>{{$client->alamat_client}}</td>
                                            <td>{{$client->contact_person}}</td>
                                            <td>
                                                <a href="/pilihclient/{{$client->id_client}}">
                                                    <i class="fas fa-check-square"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection