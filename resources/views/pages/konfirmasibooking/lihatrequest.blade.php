@extends('layouts.app')

@section('content')
    <div>
        {{ Form::open(['action' => 'OrderIklanController@searchrequest','menthod' => 'POST']) }}
        {{Form::text('search', null,['placeholder' => 'input nama client/nama produk/no order'])}}
        {{Form::submit('SEARCH')}}
        {{ Form::close() }}
    </div>
    <div>
        @if(isset($lihat_requests))
        <table>
            <thead>
                <tr>
                    <th>No Order</th>
                    <th>Tanggal Request</th>
                    <th>Jenis Iklan</th>
                    <th>Nama Client</th>
                    <th>Nama Produk</th>
                    <th>Priode Tayang</th>
                    <th>Tanggal Konfirmasi</th>
                    <th>Status Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lihat_requests as $request)
                <tr>
                    <td>{{$request->id_order_iklan}}</td>
                    <td>{{$request->tanggal_request}}</td>
                    <td>{{$request->nama_jenis_iklan}}</td>
                    <td>{{$request->nama_client}}</td>
                    <td>{{$request->nama_produk}}</td>
                    <td>{{$request->priode_awal}}" - "{{$request->priode_akhir}}</td>
                    <td>{{$request->tanggal_konfirmasi}}</td>
                    @if($request->status_order == 'Requested')
                        <td><a href="/konfirmasibooking/{{$request->id_order_iklan}}">
                            {{$request->status_order}}
                        </a></td>
                    @else
                        <td>{{$request->status_order}}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection