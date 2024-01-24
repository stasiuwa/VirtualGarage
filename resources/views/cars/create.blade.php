<div class="modal fade" id="addCarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodaj swoją furmankę!</h5>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <h5>Popraw wprowadzone dane</h5>
                </div>
            @endif

            <form action="/cars" method="POST">
                {{ csrf_field() }}
                <div class="modal-form-body">

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
                    <div class="modal-form-body">
                        <button type="submit" class="modal-btn">Dodaj auto</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
