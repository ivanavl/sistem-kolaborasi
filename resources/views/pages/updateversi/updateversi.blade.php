@extends('layouts.app')

@section('content')
    <div>
        <h3>Update Versi Iklan</h3>
    </div> 
    <div>
        @if(isset($lihat_order))
            @foreach($lihat_order as $result)
            <table>
                
                <tr>
                    <td>No Order</td>
                    <td>{{$result->id_order_iklan}}</td>
                </tr>
                <tr>
                    <td>Nama Client</td>
                    <td>{{$result->nama_client}}</td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td>{{$result->nama_produk}}</td>
                </tr>
                <tr>
                    <td>Jenis Iklan</td>
                    <td>{{$result->nama_jenis_iklan}}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>{{$result->nama_kategori}}</td>
                </tr>
                <tr>
                    <td>AE</td>
                    <td>{{$result->name}}</td>
                </tr>
                <tr>
                    <td>Vesi</td>
                    <td>
                        {{ Form::open(['action' => 'OrderIklanController@updateversi','menthod' => 'POST']) }}
                        {{Form::text('versi_iklan', $result->versi_iklan)}}
                        {{Form::hidden('id_order_iklan', $result->id_order_iklan)}}
                    </td>
                </tr>
            </table>
            @endforeach
        @endif
        {{Form::submit('UPDATE')}}
        {{ Form::close() }}
    </div>
@endsection