@extends('layouts.layout')


@section('title', 'Szczegóły')

@section('img-content')

    <div class="car-details-header">
        <div class="car-details-header-txt">{{$car->brand}} {{$car->model}}</div>
        <div class="car-details-header-btn">
            <form class="nav-item" style="" method="post" action="/cars/{{$car->id}}">
                @method('delete')
                @csrf
                    <button class="delete-btn" onclick="return confirm('Czy na pewno chcesz usunąć te auto?')">
                        USUŃ
                    </button>
            </form>
            <a class="nav-item" id="modalCarBtn" data-toggle="modal" data-target="#addCarModalExtended">EDYTUJ DANE</a>
            <a class="nav-item" href="{{ route( 'carPosts', ['id' => $car->id]) }}" >WPISY</a>
            <a class="nav-item" href="{{ url('/cars') }}" >GARAŻ</a>
        </div>
    </div>
@endsection

@section('content')
    @auth
        <div class="car-details-body">

            <div class="car-details-posts-container">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="post-item">{{$post->type}}</div>
                        <div class="post-item">{{$post->details}}</div>
                        <div class="post-item">Cena: {{$post->price}} zł</div>
                        <div class="post-item">Przebieg: {{$post->mileage}} km</div>
                    </div>
                @endforeach
            </div>

            <div class="car-details-container">

                <div class="car-details-photos">
                </div>

                <div class="car-details-info">
                    <table class="table-custom" style="width: 33%;">

                        <tbody>
                        <tr>
                            <td class="table-text">Marka</td>
                            <td>{{$car->brand}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">Model</td>
                            <td>{{$car->model}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">Wersja</td>
                            <td>{{$car->version}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">Generacja</td>
                            <td>{{$car->generation}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">Rok produkcji</td>
                            <td>{{$car->car_year}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">Napęd</td>
                            <td>{{$car->drive}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">VIN</td>
                            <td>{{$car->vin}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table-custom" style="width: 33%;">
                        <tbody>
                        <tr>
                            <td class="table-text">Kod silnika</td>
                            <td>{{$car->engine}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">Pojemność skokowa</td>
                            <td>{{$car->engine_cap}} cm^3</td>
{{--                            	&#13220;--}}
                        </tr>
                        <tr>
                            <td class="table-text">Rodzaj paliwa</td>
                            <td>{{$car->fuel}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">Moc</td>
                            <td>{{$car->power}} KM</td>
                        </tr>
                        <tr>
                            <td class="table-text">Moment</td>
                            <td>{{$car->torque}} Nm</td>
                        </tr>
                        <tr>
                            <td class="table-text">Przebieg</td>
                            <td>{{$car->mileage}} km</td>
                        </tr>
                        <tr>
                            <td class="table-text">Kod Lakieru</td>
                            <td>{{$car->paint_code}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table-custom" style="width: 33%;">
                        <thead>
                        <th>DOKUMENTY</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="table-text">Numer rejestracyjny</td>
                            <td>{{$car->reg_plate}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">Termin przeglądu</td>
                            <td>{{$car->service_date}}</td>
                        </tr>
                        </tbody>
                        <thead>
                        <tr>
                            <th>Ubezpieczenie</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="table-text">Typ ubezpieczenia</td>
                            <td>{{$car->insurance}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">Termin płatności</td>
                            <td>{{$car->insurance_pay_time}}</td>
                        </tr>
                        <tr>
                            <td class="table-text">Cena</td>
                            <td>{{$car->insurance_price}} zł</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
{{--    modal do edycji danych o samochodzie--}}
    <div class="modal fade" id="addCarModalExtended" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content" >
                <div class="modal-header" >
                    <h5 class="modal-title" id="exampleModalLabel">Co się zmieniło?</h5>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <h5>Popraw wprowadzone dane!</h5>
                    </div>
                @endif

                <form action="/cars/{{$car->id}}" method="post">
                    @method('patch')
                    @csrf
                    <div class="modal-form-body" >
                        <div class="modal-form-content">
                            <label>Marka</label>
                            <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ $car->brand  }}" placeholder="( Saab )">
                            @error('brand')
                            <span class="invalid-feedback">Wprowadz marke auta</span>
                            @enderror

                            <label>Model</label>
                            <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ $car->model }}" placeholder="( 9-3 )">
                            @error('model')
                            <span class="invalid-feedback">Wprowadz model auta</span>
                            @enderror

                            <label>Wersja</label>
                            <input type="text" name="version" class="form-control @error('version') is-invalid @enderror" value="{{ $car->version }}" placeholder="( Aero )">
                            @error('version')
                            <span class="invalid-feedback">Wprowadz wersje auta</span>
                            @enderror

                            <label>Generacja</label>
                            <input type="text" name="generation" class="form-control @error('generation') is-invalid @enderror" value="{{ $car->generation }}" placeholder="( II )">
                            @error('generation')
                            <span class="invalid-feedback">Wprowadz generacje auta</span>
                            @enderror

                            <label>Rok produkcji</label>
                            <div class="input-group-custom">
                                <input type="number" name="car_year" class="form-control @error('car_year') is-invalid @enderror" value="{{$car->car_year}}" placeholder="( 2009 )">
                                @error('car_year')
                                <span class="invalid-feedback">Wprowadz poprawny rocznik auta - sam rok, tylko liczby</span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text"> rok </span>
                                </div>
                            </div>


                            <label>Napęd</label>
                            <input type="text" name="drive" class="form-control @error('drive') is-invalid @enderror" value="{{ $car->drive }}" placeholder="( FWD/RWD/AWD )">
                            @error('drive')
                            <span class="invalid-feedback">Wprowadz naped auta</span>
                            @enderror

                            <label>Numer VIN</label>
                            <input type="text" name="vin" class="form-control @error('vin') is-invalid @enderror" value="{{ $car->vin }}" placeholder="( numer vin )">
                            @error('vin')
                            <span class="invalid-feedback">Wprowadz VIN auta (13znaków)</span>
                            @enderror
                        </div>
                        <div class="modal-form-content">
                            <label>Kod silnika</label>
                            <input type="text" name="engine" class="form-control @error('engine') is-invalid @enderror" value="{{ $car->engine }}" placeholder="( Z19DTR )">
                            @error('engine')
                            <span class="invalid-feedback">Wprowadz kod silnika</span>
                            @enderror

                            <label>Pojemność skokowa</label>
                            <div class="input-group-custom">
                                <input type="number" name="engine_cap" class="form-control @error('engine_cap') is-invalid @enderror" value="{{ $car->engine_cap }}" placeholder="( 1910 )">
                                @error('engine_cap')
                                <span class="invalid-feedback">Wprowadz pojemność silnika</span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text"> cm^3 </span>
                                </div>
                            </div>

                            <label>Rodzaj paliwa</label>
                            <input type="text" name="fuel" class="form-control @error('fuel') is-invalid @enderror" value="{{$car->fuel}}" placeholder="( Diesel/Benzna/Benzyna+LPG )">
                                @error('fuel')
                                    <span class="invalid-feedback">Wprowadz rodzaj paliwa silnika</span>
                                @enderror

                            <label>Moc</label>
                            <div class="input-group-custom">
                                <input type="number" name="power" class="form-control @error('power') is-invalid @enderror" value="{{$car->power}}" placeholder="( 150 )">
                                @error('power')
                                <span class="invalid-feedback">Wprowadz moc silnika</span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text"> KM </span>
                                </div>
                            </div>

                            <label>Moment</label>
                            <div class="input-group-custom">
                                <input type="number" name="torque" class="form-control @error('torque') is-invalid @enderror" value="{{$car->torque}}" placeholder="( 315 )">
                                @error('torque')
                                <span class="invalid-feedback">Wprowadz moment silnika</span>
                                @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text"> Nm </span>
                                </div>
                            </div>

                            <label>Przebieg</label>
                            <div class="input-group-custom">
                                <input type="number" name="mileage" class="form-control @error('mileage') is-invalid @enderror" value="{{ $car->mileage }}" placeholder="( 192300 )">
                                <div class="input-group-append">
                                    <span class="input-group-text"> km </span>
                                </div>
                                @error('mileage')
                                <span class="invalid-feedback">Wprowadz przebieg auta</span>
                                @enderror
                            </div>

                            <label>Kod lakieru</label>
                            <input type="number" name="paint_code" class="form-control @error('paint_code') is-invalid @enderror" value="{{$car->paint_code}}" placeholder="( 280 )">
                            @error('paint_code')
                            <span class="invalid-feedback">Wprowadz kod lakieru</span>
                            @enderror
                        </div>
                        <div class="modal-form-content">
                            <label>Numer rejestracyjny</label>
                            <input type="text" name="reg_plate" class="form-control @error('reg_plate') is-invalid @enderror" value="{{ $car->reg_plate }}" placeholder="( L0W1TAM )">
                            @error('reg_plate')
                            <span class="invalid-feedback">Wprowadz numer rejestracyjny auta</span>
                            @enderror

                            <label>Termin przeglądu</label>
                            <div class='input-group date' id='datetimepicker'>
                                <input type='datetime-local' class="form-control" value="{{ $car->service_data }}"/>
                            </div>

                            <label>Typ ubezpieczenia</label>
                            <input type="text" name="insurance" class="form-control @error('insurance') is-invalid @enderror" value="{{ $car->insurance }}" placeholder="( OC/AC/Assistance )">
                            @error('insurance')
                            <span class="invalid-feedback">Wprowadz rodzaj ubezpieczenia auta</span>
                            @enderror

                            <label>Termin płatności</label>
                            <div class='input-group date' id='datetimepicker'>
                                <input type='datetime-local' class="form-control" value="{{$car->insurance_pay_time}}"/>
                            </div>

                            <label>Cena</label>
                            <div class="input-group-custom">
                                <input type="number" name="insurance_price" class="form-control @error('insurance_price') is-invalid @enderror" value="{{ $car->insurance_price }}" placeholder="( 999 )">
                                <div class="input-group-append">
                                    <span class="input-group-text"> zł </span>
                                </div>
                                @error('insurance_price')
                                <span class="invalid-feedback">Wprowadz cene ubezpieczenia auta</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-form-body">
                        <div class="modal-btn">
                            <button type="submit" class="form-btn-custom">Zapisz zmiany</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
{{--                ten datepicker ma to w dupie po calosci ocb--}}
                config = {
                    enableTime: false,
                    minDate: 'today',
                    dateFormat: 'Y-m-d',
                }
                flatpickr("input[type=datetime-local]", config);
            </script>
        @endpush
{{--    modal do dodania wpisu do auta--}}

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
