@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="row justify-content-center full-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Pendaftaran Client</div>

                    {{ Form::open(['action' => 'ClientController@searchclient','menthod' => 'POST']) }}
                    <div class="card-body align-center-vh">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label for="nama_client" class="col-form-label">Nama Client</label>
                                </div>
                                <div class="col-7">
                                    <input class="form-control" name="search" type="text" placeholder="input nama client/alamat/contact person">
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
                                <table class="table table-striped table-custom table-bordered">
                                    <thead>
                                    <tr class="d-flex">
                                        <th class="col-12" colspan="3">
                                            <h3>Hasil Pencarian</h3>
                                        </th>
                                    </tr>
                                    <tr class="d-flex">
                                        <th class="col-2">ID</th>
                                        <th class="col-3">Nama Client</th>
                                        <th class="col-3">Alamat Client</th>
                                        <th class="col-3">Contact Person</th>
                                        <th class="col-1"><i class="fas fa-check"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $client)
                                        <tr class="d-flex">
                                            <th class="col-2">{{$client->id_client}}</th>
                                            <td class="col-3">{{$client->nama_client}}</td>
                                            <td class="col-3">{{$client->alamat_client}}</td>
                                            <td class="col-3">{{$client->contact_person}}</td>
                                            <td class="col-1">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection