<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistem-Kolaborasi') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <h1 class="h3 mb-3 font-weight-normal">Log in</h1>
        {{ Form::open(['menthod' => 'POST']) }}
            {{Form::label('username', 'Username')}}
            {{Form::text('username')}}
            {{Form::label('password', 'Password')}}
            {{Form::password('password', ['class' => 'awesome'])}}
            {{Form::submit('LOGIN')}}
        {{ Form::close() }}
    </body>
</html>