@extends('layout')

@section('title', 'Mój Garaż')
@section('image', '/img/garaz.png')

@section('img-content')
    <div class="on-image logo" style="left: 5%; top: 10%;">
        GARASH&nbsp;<img class="logo-img" src="/img/merolszkictest5canva.png"/>
    </div>
@stop

@section('content')
    <div class="">
        @auth
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <a class="form-back" href="{{ url('/') }}">STRONA GŁÓWNA</a>

                        <!-- Right Side Of Navbar -->
                        <div>
                            {{ Auth::user()->name }}
                        </div>
                        <a class="" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </nav>
        @endauth
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
    </div>
@stop
