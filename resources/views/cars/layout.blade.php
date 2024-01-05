<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

    </head>
    <body style="background: #2d3748">
        <div>
            @section('navbar')
                <h1>PASEK NAWIGACYJYJY</h1>
            @show
            <div style="color: wheat; font-size: 200%">
                <h1>test1</h1>
                <h2>moj garażyk pach apch</h2>
                @yield('content')
            </div>
        </div>
    </body>
</html>
