@extends('layouts.layout')

@section('title', 'Garash')
@section('image', '/img/mainmenuimg.png')

@section('img-content')
    <div class="on-image menu-text">ZARZĄDZAJ<br/><font color="#ff4c4c">SWOIMI AUTAMI</font></div>
    <div class="on-image menu-btn">
        @guest
            @if (Route::has('login'))
                <button class="btn btn-dark login-button"><a class="login-button" href="{{ route('login') }}">ZALOGUJ
                        SIĘ &#x2192;</a></button> <br/>
            @endif

            @if (Route::has('register'))
                <a style="color: white; font-size: 1vw;" href="{{ route('register') }}">Nie masz konta? Zarejestruj
                    się!</a>
            @endif
        @else
            <div class="user-btn-links">
                <a class="user-btn-text" href="{{url('/cars')}}">Mój garaż</a>
                <a class="user-btn-text" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj się</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        @endguest
    </div>
    <div class="on-image logo" style="right: 5%;top: 5%; text-align: right">
        GARASH&nbsp;<img class="logo-img" src="/img/merolszkictest5canva.png"/>
    </div>

@stop


@section('content')

@stop

