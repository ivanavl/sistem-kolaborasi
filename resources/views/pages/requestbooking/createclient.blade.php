@extends('layouts.app')

@section('content')
    <div class="row justify-content-center full-height">
        <div class="col-md-12">
            <div class="card full">
                <div class="card-header">Pendaftaran Klien</div>

                {{ Form::open(['action' => 'ClientController@storeclient', 'method' => 'POST']) }}
                <div class="card-body align-center-vh">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label for="nama_client" class="col-form-label">Nama Klien</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="nama_client">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="alamat_client" class="col-form-label">Alamat</label>
                            </div>
                            <div class="col-9">
                                <textarea type="text" class="form-control" name="alamat_client"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="npwp_client" class="col-form-label">NPWP</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="npwp_client">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="contact_person" class="col-form-label">Narahubung</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="contact_person">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="telepon_client" class="col-form-label">Telepon</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="telepon_client">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="email_client" class="col-form-label">Email</label>
                            </div>
                            <div class="col-9">
                                <input type="email" class="form-control" name="email_client">
                            </div>
                        </div>
                        <div class="row">
                            <a class="col-12 mini-link" href="/lihatklien">Klien sudah terdaftar</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input class="btn btn-primary" type="submit" value="Berikut">
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection