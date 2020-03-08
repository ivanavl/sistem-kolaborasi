@extends('layouts.app')

@section('content')
<div>
    <ul>
        @foreach($menus as $menu)
            <li><a href="{{$menu->route_name}}">{{$menu->nama_menu}}</a></li>
        @endforeach
    </ul>
</div>
@endsection
