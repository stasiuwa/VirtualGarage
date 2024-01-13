@extends('layouts.form')

@section('title', 'Logowanie')
@section('link', '/register')
@section('link-text', 'Rejestracja')

@section('content')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">Adres E-mail</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                       name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3" style="display: flex; flex-flow: wrap">
            {{--                <div style="">--}}
            {{--                    @if (Route::has('password.request'))--}}
            {{--                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color: white;opacity: 0.7">--}}
            {{--                            Przypomnij hasło--}}
            {{--                        </a>--}}
            {{--                    @endif--}}
            {{--                </div>--}}
            <div style="text-align: right; font-size: 3vw;">
                <button type="submit" class="login-button" style="background: #1d0e0b;">
                    Zaloguj
                </button>
            </div>
        </div>
    </form>
@endsection
