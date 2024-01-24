@extends('layouts.form')

@section('link', '/login')
@section('link-text', 'Masz konto? Zaloguj się')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">Nazwa</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end"> Adres e-mail</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">Hasło</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <ul style="font-size: 100%; margin-left: 15%; margin-top: 2%">
                Hasło powinno zawierać co najmniej
                <li class="li">jedną wielką literę</li>
                <li class="li">jedną małą literę</li>
                <li class="li">jedną cyfrę.</li>
            </ul>
        </div>
        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Powtórz hasło</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                       autocomplete="new-password">
            </div>
        </div>

        <div style="width: 100%">
            <input style="margin-left: 10%;" class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                   name="terms" required>
            <label class="form-check-label" for="flexCheckDefault">
                Akceptuję <a style="color: lightgoldenrodyellow" href="{{ url("/termsofuse.pdf") }}" target="_blank">regulamin
                    użytkowania</a>
            </label>
        </div>

        <div class="row mb-0" style="text-align: right">
            <div style="text-align: center">
                <button type="submit" class="login-button" style="background: #1d0e0b; margin: 1%;">
                    Zarejestruj się
                </button>
            </div>
        </div>
    </form>
@endsection
