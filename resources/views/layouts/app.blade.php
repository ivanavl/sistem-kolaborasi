<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem-Kolaborasi') }}</title>

    <!-- Styles -->

    <!-- Bootstrap CSS CDN -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="wrapper">
        <!-- Sidebar  -->
        @auth
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Radio Maestro</h3>
                    <strong>RM</strong>
                </div>

                <div class="sidebar-profile">
                    <div>
                        <img src={{ asset('avatar.png') }} class="profile-image" alt="Avatar" title="<b>{{ Auth::user()->name }}</b> <br> {{ Auth::user()->role->role_name }}" id="tooltip">
                    </div>
                    <div class="profile-details">
                        <div>
                            <strong>{{ Auth::user()->name }}</strong>
                        </div>
                        <div>
                            {{ Auth::user()->role->role_name }}
                        </div>
                    </div>
                </div>

                <ul class="list-unstyled components sidebar-menu customscroll">
                    <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                        <a href="/">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    @if (Auth::user()->role_id == App\Role::TRAFFIC_IKLAN)
                    <li class="{{ (request()->is('createjadwal*')) || (request()->is('lihattemplate*')) ? 'active' : '' }}">
                        <a href="/createjadwal">
                            <i class="fas fa-calendar-plus"></i>
                            <span>Create Jadwal</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('konfirmasibooking*')) ? 'active' : '' }}">
                        <a href="/konfirmasibooking">
                            <i class="fas fa-tasks"></i>
                            <span>Konfirmasi Booking</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('lihatjadwal*')) && ! (request()->is('lihatjadwalfinal*')) ? 'active' : '' }}">
                        <a href="/lihatjadwal">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Lihat Jadwal</span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role_id == App\Role::MARKETING || Auth::user()->role_id == App\Role::TRAFFIC_IKLAN)
                    <li class="{{ (request()->is('carijadwal*')) || (request()->is('keepjadwal*')) || (request()->is('lihatclient*')) ? 'active' : '' }}">
                        <a href="/carijadwal">
                            <i class="fas fa-search"></i>
                            <span>Cari Jadwal</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('lihatrequest*')) ? 'active' : '' }}">
                        <a href="/lihatrequest">
                            <i class="fas fa-file-alt"></i>
                            <span>Lihat Request</span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role_id == App\Role::PRODUKSI || Auth::user()->role_id == App\Role::TRAFFIC_IKLAN)
                    <li class="{{ (request()->is('updateversi*')) ? 'active' : '' }}">
                        <a href="/updateversi">
                            <i class="fas fa-search"></i>
                            <span>Update Versi Iklan</span>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role_id == App\Role::STUDIO || Auth::user()->role_id == App\Role::TRAFFIC_IKLAN)
                    <li class="{{ (request()->is('lihatjadwalfinal*')) ? 'active' : '' }}">
                        <a href="/lihatjadwalfinal">
                            <i class="fas fa-file-alt"></i>
                            <span>Lihat Jadwal Final</span>
                        </a>
                    </li>
                    @endif

                </ul>
            </nav>
        @endauth

        <div class="main" #main-container>
            <!-- Navbar  -->
            <nav class="navbar navbar-expand navbar-dark sticky-top">
                <!--Navbar logo-->
                <div class="navbar-brand mr-0 mr-md-2" href="#">
                    @auth
                        {{--<button type="button" id="sidebarCollapse" class="btn btn-primary" onclick="">--}}
                            {{--<div id="is-hide">--}}
                                {{--<i class="fas fa-chevron-left toggle-hide"></i>--}}
                                {{--<i class="fas fa-chevron-right toggle-show"></i>--}}
                            {{--</div>--}}
                        {{--</button>--}}
                    @endauth
                </div>


                <!--Navbar menu right, auto hide below medium-->
                <ul class="navbar-nav ml-auto d-md-flex">
                    @guest
                        <li class="nav-item dropdown">
                            <a class="nav-item nav-link mr-2" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-item nav-link mr-2" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>


            <!-- Page Content  -->
            @guest
                <div id="content" class="customscroll withbackground align-center-vh">
                    <div class="container">
            @else
                <div id="content" class="customscroll align-center-vh">
                    <div class="container full-height">
            @endguest
                    @include('layouts.message')
                    @yield('content')
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- Scripts -->

<!-- Font Awesome JS -->
<script src={{ asset('js/fontawesome.js') }}></script>
<script src={{ asset('js/solid.js') }}></script>

<!-- jQuery CDN -->
<script src={{ asset('js/jquery.min.js') }}></script>
<!-- Popper.JS -->
<script src={{ asset('js/popper.min.js') }}></script>
<!-- Bootstrap JS -->
<script src={{ asset('js/bootstrap.min.js') }}></script>
<!-- Our Custom JS -->
<script src={{ asset('js/script.js') }}></script>
</body>
</html>
