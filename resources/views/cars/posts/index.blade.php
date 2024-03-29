@extends('layouts.layout')

@section('img-content')
    <div class="car-details-header">
        <div class="car-details-header-txt">{{$car->brand}} {{$car->model}}</div>
        <div class="car-details-header-btn">
            <a id="modalBtn" class="nav-item" data-toggle="modal" data-target="#addPostModal">DODAJ WPIS</a>
            <a href="{{ url('/cars') }}" class="nav-item">GARAŻ</a>
            <a href="{{ url('/cars/' . $car->id . '/details') }}" class="nav-item">SZCZEGÓŁY AUTA</a>
        </div>

    </div>
@endsection
@section('content')
    <div class="post post-header" style="margin-left: 5%;">
        <div class="post-item" style="width: 15%"></div>
        <div class="post-item" style="width: 35%">OPIS</div>
        <div class="post-item" style="width: 20%">CENA</div>
        <div class="post-item" style="width: 5%">PRZEBIEG</div>
    </div>
    @foreach($posts as $post)
        <div class="post">
            <div class="post-item" style="width: 15%">{{$post->type}}</div>
            <div class="post-item" style="width: 45%">{{$post->details}}</div>
            <div class="post-item" style="width: 10%">{{$post->price}} zł</div>
            <div class="post-item" style="width: 15%">{{$post->mileage}} km</div>
            <div class="modal fade" id="editPostModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPostModalLabel">Edycja Wpisu</h5>
                        </div>
                        <div class="modal-form-body">
                            <form action="{{route('editPost', ['car_id'=>$car->id, 'post_id' => $post->id])}}" method="post">
                                @csrf
                                @method('post')

                                <div class="form-group">
                                    <label for="type">Typ:</label>
                                    <input type="text" name="type" value="{{ $post->type }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="details">Szczegóły:</label>
                                    <textarea name="details" class="form-control" required>{{ $post->details }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="mileage">Przebieg:</label>
                                    <input type="number" name="mileage" value="{{ $post->mileage }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="price">Cena:</label>
                                    <input type="number" name="price" value="{{ $post->price }}" class="form-control" required>
                                </div>
                                <div class="modal-form-body">
                                    <button type="submit" class="btn btn-primary modal-btn">Zapisz zmiany</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex; flex-flow: row; margin-top: 1%; margin-right: 5px">
                <a id="modalBtn" data-toggle="modal" data-target="#editPostModal{{$post->id}}"><button class="car-item car-item-btn" style="color: yellow">EDYTUJ</button></a>
                <form action="{{ route('post_delete', ['id' => $post->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="car-item car-item-btn" style="width:100%;font-size: 120%; color: red;" type="submit" onclick="return confirm('Czy na pewno chcesz usunąć ten rekord?')">X</button>
                </form>
            </div>

        </div>
    @endforeach
{{--    modal dodania wpisu--}}
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj wpis do auta</h5>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <h4>Popraw wprowadzone dane</h4>
                    </div>
                @endif

                <form action="{{route('addPost', ['id'=>$car->id])}}" method="POST">
                    @method('post')
                    @csrf

                    <div class="modal-form-body">

                        <div class="form-group">
                            <label>Typ wpisu</label>
                            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{old('type')}}" placeholder="olej/hamulce/opony itp">
                            @error('type')
                            <span class="invalid-feedback">Wprowadz typ wpisu</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Szczegóły</label>
                            <input type="text" name="details" class="form-control @error('details') is-invalid @enderror" value="{{old('details')}}" placeholder="opis">
                            @error('details')
                            <span class="invalid-feedback">Wprowadz opis</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Cena</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" placeholder="cena">
                            @error('price')
                            <span class="invalid-feedback">Wprowadz cene</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Przebieg</label>
                            <input type="number" name="mileage" class="form-control @error('mileage') is-invalid @enderror" value="{{$car->mileage}}" placeholder="cena">
                            @error('mileage')
                            <span class="invalid-feedback">Wprowadz poprawny przebieg</span>
                            @enderror
                        </div>
{{--                        <input type="number" name="car_id" value="{{$car->id}}" style="display: none">--}}

                        <div class="modal-form-body">
                            <button type="submit" class="modal-btn">Dodaj wpis</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--    modal do edycji --}}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


@endsection
