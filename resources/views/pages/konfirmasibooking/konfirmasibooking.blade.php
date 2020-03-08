@extends('layouts.app')

@section('content')
    <div>
        <h3>Konfirmasi Booking</h3>
    </div> 
    <div>
        @if(isset($result1, $result2))
            @foreach($result1 as $result_1)
            <table>
                
                <tr>
                    <td>No Order</td>
                    <td>{{$result_1->id_order_iklan}}</td>
                </tr>
                <tr>
                    <td>Nama Client</td>
                    <td>{{$result_1->nama_client}}</td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td>{{$result_1->nama_produk}}</td>
                </tr>
                <tr>
                    <td>Jenis Iklan</td>
                    <td>{{$result_1->nama_jenis_iklan}}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>{{$result_1->nama_kategori}}</td>
                </tr>
                <tr>
                    <td>Jumlah Tayang</td>
                    <td>{{$result_1->jumlah_tayang}}</td>
                </tr>
                <tr>
                    <td>Jadwal Tayang</td>
                    <td>
                        <table>
                            @foreach ($result2 as $result_2)
                                <tr>
                                    <td>{{$result_2->tanggal_jadwal}}</td>
                                    <td>{{$result_2->jam_jadwal}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
            {{ Form::open(['action' => 'OrderIklanController@konfirmasibooking','menthod' => 'POST']) }}
                {{Form::hidden('konfirmasi', 1)}}
                {{Form::hidden('id_order_iklan', $result_1->id_order_iklan)}}
                {{Form::submit('KONFIRMASI PEMASANGAN')}}
            {{ Form::close() }}
            {{ Form::open(['action' => 'OrderIklanController@konfirmasibooking','menthod' => 'POST']) }}
                {{Form::hidden('konfirmasi', 0)}}
                {{Form::hidden('id_order_iklan', $result_1->id_order_iklan)}}
                {{Form::submit('KONFIRMASI PEMBATALAN')}}
            {{ Form::close() }}
            @endforeach
        @endif
    </div>
@endsection