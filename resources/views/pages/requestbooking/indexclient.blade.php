@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pencarian Klien</div>

                {{ Form::open(['action' => 'ClientController@searchclient','menthod' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="nama_client" class="col-form-label">Cari Klien</label>
                            </div>
                            <div class="col-7">
                                <input class="form-control" name="search" type="text"
                                       placeholder="input nama client/alamat/contact person">
                            </div>
                            <div class="col-2">
                                <input class="btn btn-primary" type="submit" value="Cari">
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
                                        <th class="col-12" colspan="5">
                                            <h3>Daftar Klien</h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Klien</th>
                                        <th>Alamat</th>
                                        <th>Contact Person</th>
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
                                                <a href="/pilihklien/{{$client->id_client}}">
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