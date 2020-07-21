<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @yield('admin_css')
</head>
<style>
    .navbar{
        margin-bottom: 0px !important;
    }
    .container-fluid{
        padding: 0px !important;
    }
    .navbar-light .navbar-toggle .icon-bar{
        background-color: lightgreen !important;
    }
    .navbar-toggle{
        background-color: #6c757d !important;
        border: #0b2e13 !important;
    }
    .nav>li>a:hover{
        background-color: white !important;
    }
    .nav>li>a:focus, .nav>li>a:hover{
        background-color: white !important;
    }
</style>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="{{route('products.all')}}">Shope</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                    <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> {{ __('Register') }}</a></li>
                    <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> {{ __('Login') }}</a></li>
                    @else
                        <li class="nav-item">
                            <a class="" href="" role="button" data-toggle="modal" data-target="#myModal" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->profile->name }} <span></span>
                            </a>
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Logout</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            Are You sure you want to logout?
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <a class="btn btn-success" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container-fluid">
    <div class="row">
{{--        <div class="col-md-3">--}}
{{--            @section('sidebar')--}}
{{--                @include('layouts.partials.sidebar')--}}
{{--            @show--}}
{{--        </div>--}}
        <div class="col-md-12">
            @if(session()->has('message'))
                <p class="alert alert-success">
                    {{ session()->get('message') }}
                </p>
            @endif
            @yield('content')
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@yield('scripts')
</body>
</html>
