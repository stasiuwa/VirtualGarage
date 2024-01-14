@extends('layouts.layout')


@section('title', 'Szczegóły')

@section('img-content')
    <div class="car-details-header">
        <div class="car-details-header-txt">{{$car->brand}} {{$car->model}}</div>
        <div class="car-details-header-btn">
            <form style="" method="post" action="/cars/{{$car->id}}">
                @method('delete')
                @csrf
                <button class="car-details-back-btn">USUN</button>
            </form>
            <a id="modalPostBtn" data-toggle="modal" data-target="#addPostModal"><button class="car-details-back-btn">DODAJ WPIS</button></a>
            <a id="modalCarBtn" data-toggle="modal" data-target="#editModal{{$car->id}}"><button class="car-details-back-btn">EDYTUJ DANE</button></a>
            <a href="{{ url('/cars/posts/index') }}" ><button class="car-details-back-btn">WSZYSTKIE WPISY</button></a>
            <a href="{{ url('/cars') }}" ><button class="car-details-back-btn">GARAŻ</button></a>
        </div>
    </div>
@endsection

@section('content')
    @auth
    <div class="car-details-body">

        <div class="car-details-posts-container">
            <div class="post"><x-post-item></x-post-item></div>
        </div>

        <div class="car-details-container">

            <div class="car-details-photos">

            </div>
            <div class="car-details-info">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>SZCZEGÓŁY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Marka</td>
                            <td>{{$car->brand}}</td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>{{$car->model}}</td>
                        </tr>
                        <tr>
                            <td>Wersja</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Generacja</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Rok produkcji</td>
                            <td>{{$car->car_year}}</td>
                        </tr>
                        <tr>
                            <td>Napęd</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>VIN</td>
                            <td>test</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table-custom">
                    <thead>
                        <th>SILNIK</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kod silnika</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Pojemność skokowa</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Rodzaj paliwa</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Moc</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Moment</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Skrzynia biegów</td>
                            <td>test</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table-custom">
                    <thead>
                        <th>DOKUMENTY</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Numer rejestracyjny</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Termin przeglądu</td>
                            <td>test</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Ubezpieczenie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Typ ubezpieczenia</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Termin płatności</td>
                            <td>test</td>
                        </tr>
                        <tr>
                            <td>Cena</td>
                            <td>test</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{--    modal do edycji danych o samochodzie--}}
    <div class="modal fade" id="addCarModalExtended" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj swoją furmankę!</h5>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <h5>Popraw wprowadzone dane</h5>
                    </div>
                @endif

                <form action="/cars" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Marka</label>
                            <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{$car->brand}}" placeholder="( Opel )">
                            @error('brand')
                            <span class="invalid-feedback">Wprowadz marke auta</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{$car->model}}" placeholder="( Zafira )">
                            @error('model')
                            <span class="invalid-feedback">Wprowadz model auta</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Rok produkcji</label>
                            <input type="text" name="car_year" class="form-control @error('car_year') is-invalid @enderror" value="{{$car->car_year}}" placeholder="( 2006 )">
                            @error('car_year')
                            <span class="invalid-feedback">Wprowadz poprawny rocznik auta - sam rok, tylko liczby</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kod silnika</label>
                            <input type="text" name="engine" class="form-control @error('engine') is-invalid @enderror" value="{{$car->engine}}" placeholder="( 1.9CDTi )">
                            @error('engine')
                            <span class="invalid-feedback">Wprowadz oznaczenie silnika</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Przebieg(km)</label>
                            <input type="text" name="mileage" class="form-control @error('mileage') is-invalid @enderror" value="{{$car->mileage}}" placeholder="( 192800 )">
                            @error('mileage')
                            <span class="invalid-feedback">Wprowadz przebieg auta w formacie samych liczb</span>
                            @enderror
                        </div>
                        <div class="modal-btn">
                            <button type="submit" class="form-btn">Dodaj auto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--    modal do dodania wpisu do auta--}}
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj wpis do auta</h5>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <h5>Popraw wprowadzone dane</h5>
                    </div>
                @endif

                <form action="/cars" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Marka</label>
                            <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{old('brand')}}" placeholder="( Opel )">
                            @error('brand')
                            <span class="invalid-feedback">Wprowadz marke auta</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{old('model')}}" placeholder="( Zafira )">
                            @error('model')
                            <span class="invalid-feedback">Wprowadz model auta</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Rok produkcji</label>
                            <input type="text" name="car_year" class="form-control @error('car_year') is-invalid @enderror" value="{{old('car_year')}}" placeholder="( 2006 )">
                            @error('car_year')
                            <span class="invalid-feedback">Wprowadz poprawny rocznik auta - sam rok, tylko liczby</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kod silnika</label>
                            <input type="text" name="engine" class="form-control @error('engine') is-invalid @enderror" value="{{old('engine')}}" placeholder="( 1.9CDTi )">
                            @error('engine')
                            <span class="invalid-feedback">Wprowadz oznaczenie silnika</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Przebieg(km)</label>
                            <input type="text" name="mileage" class="form-control @error('mileage') is-invalid @enderror" value="{{old('mileage')}}" placeholder="( 192800 )">
                            @error('mileage')
                            <span class="invalid-feedback">Wprowadz przebieg auta w formacie samych liczb</span>
                            @enderror
                        </div>
                        <div class="modal-btn">
                            <button type="submit" class="form-btn">Dodaj auto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    @endauth
@stop



{{--CHUJ--}}
{{--<div>Marka:{{$car->brand}}</div>--}}
{{--<div>Model:{{$car->model}}</div>--}}
{{--<div>Rocznik:{{$car->car_year}}</div>--}}
{{--<div>Silnik:{{$car->engine}}</div>--}}
{{--<div>Przebieg:{{$car->mileage}}</div>--}}
