
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    {{--<script src="{{asset('public/media/jquery/jquery-3.5.1.min.js')}}" defer></script>
    <script src="{{asset('public/media/bootstrap/js/bootstrap.js')}}" defer></script>--}}
</head>
<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1><a href="/">SimpleWork</a></h1>
        </div>
        <div id="menu">
            <ul>
                <li ><a href="{{asset('/')}}" accesskey="1" title="">Homepage</a></li>
                <li><a href="{{asset('our')}}" accesskey="2" title="">Our Clients</a></li>
                <li><a href="{{asset('about')}}" accesskey="3" title="">About Us</a></li>
                <li><a href="{{asset('careers')}}"accesskey="4" title=""> Careers</a></li>
                <li><a href="{{asset('contact')}}" accesskey="5" title="">Contact Us </a></li>
                <li><a href="{{asset('login')}}" accesskey="6" title="">Login</a></li>

            </ul>
        </div>
    </div>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Simplework') }}</title>
@stack('scripts')
<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
            <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900"
                  rel="stylesheet"/>
            <link href={{asset('public/css/default.css')}} rel="stylesheet" type="text/css" media="all"/>
            <link href={{asset('public/css/fonts.css')}} rel="stylesheet" type="text/css" media="all"/>
            <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
            {{--<link href="{{ asset('public/css/default.css') }}" rel="stylesheet">--}}
            <script src="{{asset('public/js/jquery.js')}}"></script>
            <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('public/js/main.js')}}"></script>

    {{--</body>--}}
    @yield('content')
    <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('/', 'Home Page') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Каталог
                        </button>
                        <div class="dropdown-menu" id="topmenu" aria-labelledby="dropdownMenuButton">
                            @foreach($v_catalogs as $one)
                                <a class="dropdown-item" id="$one{{$one->id}}"
                                   href="{{asset('catalog/'.$one->id)}}">{{$one->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div id="empty">Пусто

                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            {{--<ul>
                @foreach($a as $one)
                    @include('partials.link')
                @endforeach
            </ul>--}}
        </main>
    </div>
</body>
</html>
