<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link href="/css/app.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>@yield('title')</title>
</head>
<body>
    <div class="menu-container">
        <img class="img-fluid img" src="@yield('image')"/>
        <div>
            @yield('img-content')
        </div>
    </div>
    @section('navbar')
{{--        <div class="nav-container">--}}
{{--            <ul class="nav nav-underline navbar-custom" style="justify-content: center; color: white">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" aria-current="page" href="@yield('link1')">Active</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="@yield('link2')">Link</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="@yield('link3')">Link</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="@yield('link4')">Disabled</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
    @show
    <div>
        @yield('content')
    </div>
    <footer>
        <div class="footer menu-text">@PW</div>
    </footer>
</body>
</html>
