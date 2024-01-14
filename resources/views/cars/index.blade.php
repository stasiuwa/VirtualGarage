@extends('layouts.layout')
@include('cars.create')

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
@stop

@section('content')
    @auth

        @if (Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        @if ($errors->any())
{{--                ponowne otwarcie modala z formularzem po niepomyślnej walidacji--}}
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                   let openModal = document.getElementById('modalBtn');
                   openModal.click();
                });
            </script>
        @endif
        <nav>
            <div class="nav-bar-menu">

                <div class="nav-bar-menu-links">
                    <a class="nav-item" href="{{ url('/') }}">STRONA GŁÓWNA</a>
{{--                    po kliknieciu odpala modal z formualrzem dodania auta z create.blade.php--}}
                    <a id="modalBtn" class="nav-item" data-toggle="modal" data-target="#addCarModal">DODAJ AUTO</a>
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
                    <div class="cars-bar-details">
                        <div class="cars-bar-name">
                            <div>MARKA</div>
                            <div>MODEL</div>
                            <div>ROCZNIK</div>
                        </div>
                    </div>
                    <div class="cars-container">
                        @forelse($cars as $car)
                            <div class="car"><x-car-item :car="$car"></x-car-item></div>
                        @empty
                            <x-car-item></x-car-item>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @guest
    @endguest
@stop
