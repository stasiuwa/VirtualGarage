
<div style="display: flex;">
    <img style="max-width: 3vw; margin-left: 1vw; margin-right: 2vw; margin-top: 0.25vw" src="{{ url('/img/car-round.png') }}"/>
    <div class="car-item-container" style="">
        <div class="car-item">{{$car->brand}}</div>
        <div class="car-item">{{$car->model}}</div>
        <div class="car-item">{{$car->car_year}}</div>
{{--        <a id="modalBtn2"  data-toggle="modal" data-target="#editModal{{$car->id}}"><button class="car-item car-item-btn" onclick="">EDYTUJ</button></a>--}}
        <a href=" {{ route('carInfo', ['id' => $car->id]) }}"><button class="car-item car-item-btn" style="color: #ff4c4c">SZCZEGOLY</button></a>
        <form style="margin-bottom: 0" method="post" action="/cars/{{$car->id}}">
            @method('delete')
            @csrf
            <button class="car-item car-item-btn" style="color: red">USUŃ</button>
        </form>
    </div>
</div>

{{--<div class="modal fade" id="editModal{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">EDYTUJ INFO O AUCIE</h5>--}}
{{--            </div>--}}
{{--            @if($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <h5>Popraw wprowadzone dane!</h5>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <form action="/cars/{{$car->id}}" method="POST">--}}
{{--                @method('patch')--}}
{{--                @csrf--}}
{{--                <div class="modal-body">--}}

{{--                    <div class="form-group">--}}
{{--                        <label>Marka</label>--}}
{{--                        <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ $car->brand }}" placeholder="( Opel )">--}}
{{--                        @error('brand')--}}
{{--                        <span class="invalid-feedback">Wprowadz marke auta</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label>Model</label>--}}
{{--                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ $car->model }}" placeholder="( Zafira )">--}}
{{--                        @error('model')--}}
{{--                        <span class="invalid-feedback">Wprowadz model auta</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label>Rok produkcji</label>--}}
{{--                        <input type="text" name="car_year" class="form-control @error('car_year') is-invalid @enderror" value="{{$car->car_year}}" placeholder="( 2006 )">--}}
{{--                        @error('car_year')--}}
{{--                        <span class="invalid-feedback">Wprowadz poprawny rocznik auta - sam rok, tylko liczby</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label>Kod silnika</label>--}}
{{--                        <input type="text" name="engine" class="form-control @error('engine') is-invalid @enderror" value="{{$car->engine}}" placeholder="( 1.9CDTi )">--}}
{{--                        @error('engine')--}}
{{--                        <span class="invalid-feedback">Wprowadz oznaczenie silnika</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label>Przebieg(km)</label>--}}
{{--                        <input type="text" name="mileage" class="form-control @error('mileage') is-invalid @enderror" value="{{$car->mileage}}" placeholder="( 192800 )">--}}
{{--                        @error('mileage')--}}
{{--                        <span class="invalid-feedback">Wprowadz przebieg auta w formacie samych liczb</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="modal-btn">--}}
{{--                        <button type="submit" class="form-btn">Zapisz zmiany</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
