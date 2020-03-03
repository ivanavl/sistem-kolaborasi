@extends('layout.app')

@section('content')
    {{-- Sidebar --}}
    <div>
        <ul>
            @foreach($menus as $menu)
                <li><a href='/{{$menu->nama_menu}}'>{{$menu->nama_menu}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection