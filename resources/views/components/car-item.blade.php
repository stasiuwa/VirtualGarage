
<div class="car-item-container" style="color: white; display: flex; flex-flow: row">
    <div>Marka:{{$car->brand}}</div>
    <div>Model:{{$car->model}}</div>
    <div>Rocznik:{{$car->car_year}}</div>
    <a id="modalBtn2" class="" data-toggle="modal" data-target="#editModal{{$car->id}}">EDYTUJ</a>
    <form method="post" action="/cars/{{$car->id}}">
        @method('delete')
        @csrf
        <button>Delete</button>
    </form>
    <a href="{{ route('carInfo', ['id' => $car->id]) }}">szczegoly</a>
</div>

<div class="modal fade" id="editModal{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDUTYJ INFO O AUTO</h5>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <h5>Popraw wprowadzone dane</h5>
                </div>
            @endif

            <form action="/cars/{{$car->id}}" method="POST">
                @method('patch')
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Marka</label>
                        <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ $car->brand }}" placeholder="( Opel )">
                        @error('brand')
                        <span class="invalid-feedback">Wprowadz marke auta</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ $car->brand }}" placeholder="( Zafira )">
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
                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                </div>
            </form>
        </div>
    </div>
</div>
