@extends('layout')
@section('title', 'Mój Garaż')
@section('image', '/img/garaz.png')

@section('img-content')
    <div class="on-image logo" style="left: 5%; top: 10%;">
        GARASH&nbsp;<img class="logo-img" src="/img/merolszkictest5canva.png"/>
    </div>
    @auth
    <div class="on-image menu-text">
            <h1 style="font-size: 4vw">Witaj {{ Auth::user()->name }}!</h1>
    </div>
    @endauth
    @guest
        @if (Route::has('login'))
            <a class="on-image menu-text" href="{{ route('login') }}">ZALOGUJ SIĘ  &#x2192;</a>
        @endif
    @endguest
@stop

@section('content')
    @auth
        <nav>
                <div class="nav-bar-menu">

                    <div class="nav-bar-menu-links">
                        <a class="nav-item" href="{{ url('/') }}">STRONA GŁÓWNA</a>
                        <a class="nav-item" href="{{ url('/cars/create') }}">DODAJ AUTO</a>
                        <a class="nav-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            WYLOGUJ SIĘ
                        </a>
                    </div>
                </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </nav>
    <div class="card-body">
        <div class="garage-main">
            <div class="sidebar">
                <div class="sidebar-title"></div>
                <div class="post-container">
                    <div class="sidebar-post"></div>
                    <div class="sidebar-post"></div>
                    <div class="sidebar-post"></div>
                </div>
            </div>
            <div class="cars-bar">
                <div class="cars-bar-details"></div>
                <div class="cars-container">
                    <div class="car"></div>
                    <div class="car"></div>
                    <div class="car"></div>
                    <div class="car"></div>
                    <div class="car"></div>
                    <div class="car"></div>
                </div>
            </div>
        </div>
    @else
        <div style="margin-top: 10vw;height: 30vw; color: white; justify-content: center; text-align: center">
            <h1>ZAWARTOŚĆ DOSTĘPNA TYLKO DLA ZALOGOWANYCH UŻYTKOWNIKÓW</h1>
            <h2>ZAWARTOŚĆ DOSTĘPNA TYLKO DLA ZALOGOWANYCH UŻYTKOWNIKÓW</h2>
            <h3>ZAWARTOŚĆ DOSTĘPNA TYLKO DLA ZALOGOWANYCH UŻYTKOWNIKÓW</h3>
            <h4>ZAWARTOŚĆ DOSTĘPNA TYLKO DLA ZALOGOWANYCH UŻYTKOWNIKÓW</h4>
            <h5>ZAWARTOŚĆ DOSTĘPNA TYLKO DLA ZALOGOWANYCH UŻYTKOWNIKÓW</h5>
            <h6>ZAWARTOŚĆ DOSTĘPNA TYLKO DLA ZALOGOWANYCH UŻYTKOWNIKÓW</h6>
        </div>
    </div>
    @endauth
@stop
