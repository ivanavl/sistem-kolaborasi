@extends('layouts.app')

@section('content')
    <div>
        <h3>Lihat Order</h3>
        {{ Form::open(['action' => 'OrderIklanController@searchorder','menthod' => 'POST']) }}
            {{Form::text('search', null,['placeholder' => 'input nama client/nama produk/no order'])}}
            {{Form::submit('SEARCH')}}
        {{ Form::close() }}
    </div>
    <div>
        @if(isset($lihat_orders))
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
                    <th>Versi Iklan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lihat_orders as $order)
                <tr>
                    <td>{{$order->id_order_iklan}}</td>
                    <td>{{$order->tanggal_request}}</td>
                    <td>{{$order->nama_jenis_iklan}}</td>
                    <td>{{$order->nama_client}}</td>
                    <td>{{$order->nama_produk}}</td>
                    <td>{{$order->priode_awal}}" - "{{$order->priode_akhir}}</td>
                    <td>{{$order->tanggal_konfirmasi}}</td>
                    @if(is_null($order->versi_iklan))
                        <td><a href="/updateversi/{{$order->id_order_iklan}}">
                            Belum ada versi iklan
                        </a></td>
                    @else
                        <td><a href="/updateversi/{{$order->id_order_iklan}}">
                            {{$order->versi_iklan}}
                        </a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection