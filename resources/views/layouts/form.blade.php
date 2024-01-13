<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <link href="/css/app.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
        <div class="form-bar">
{{--            <!-- Left Side Of Navbar -->--}}

{{--            <!-- Right Side Of Navbar -->--}}
{{--            <a class="form-bar-text" style="" href="{{ route('logout') }}"--}}
{{--               onclick="event.preventDefault();--}}
{{--                             document.getElementById('logout-form').submit();">--}}
{{--                Wyloguj--}}
{{--            </a>--}}
{{--            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                @csrf--}}
{{--            </form>--}}
        </div>
        <div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card" style="color: white; font-family: Bahnschrift, sans-serif; font-size: 1.5vw">
                            <div class="card-header" style="display: flex; flex-flow: column; width: 100%; height: 13vw; padding-top: 1vw;  background: #1f1f1f;">
                                <div style="display: flex; flex-flow: wrap; width: 100%">
                                    <div style="width: 50%"><a class="form-details" href="{{ url('/') }}">STRONA GŁÓWNA</a></div>
                                    <div style="width: 50%; text-align: right"><a class="form-details" style="text-align: right" href="@yield('link')">@yield('link-text')</a></div>
                                </div>
                                <div class="form-title">
                                    <img class="img-logo" src="{{ url("/img/merolszkictest5canva.png") }}"/>
                                    GARASH
                                </div>
                            </div>
                            <div class="card-body" style="background: #262626; padding-top: 2vw">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
