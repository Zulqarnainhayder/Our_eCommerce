<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
</head>
<style>
    body{
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
    }
</style>
<body>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <nav class="navbar navbar-light fixed-top flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 bg-light" href="{{route('admin.dashboard')}}">Company name</a>
        <input class="col-md-8 form-control form-control-dark w-100 bg-white" type="text" placeholder="Search" aria-label="Search">
        <ul class="col-md-2 navbar-nav px-5">
            <li class="nav-item">
                <a style="font-weight: bold;background-color: #80bb01" class="btn btn-success" href="" role="button" data-toggle="modal" data-target="#myModal" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->profile->name }} <span></span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @yield("breadcrumbs")
                    </ol>
                </nav>
            </div>
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                @include('admin.partials.navbar')
            </nav>
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
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
</main>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@yield('scripts')
@section('scripts')
    <script type="text/javascript">
        function logout(){
            let choice = confirm("Are You sure, You want to Delete this user ?")
            if(choice){
                document.getElementById('delete-user-'+id).submit();
            }
        }
    </script>
@endsection
</body>
</html>
