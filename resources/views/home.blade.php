@extends('layouts.app')

@section('content')
    <div class="container full-height">
        <div class="row justify-content-center full-height">
            <div class="col-md-12">
                <div class="card full-height">
                    {{--<div class="card-header">Dashboard</div>--}}

                    <div class="card-body align-center-vh welcome-message">
                        Selamat datang,&nbsp<strong> {{ Auth::user()->name }}</strong>!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
