<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Sistem-Kolaborasi') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            @include('inc.navbar')
            <main class="py-4">
                <div class="container">
                    @include('inc.message')
                    @yield('content')
                </div>
            </main>
        </div> 
    </body>
</html>