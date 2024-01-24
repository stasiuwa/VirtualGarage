
<div style="display: flex;">
    <img style="max-width: 8%; margin-left: 5px; margin-right: 10px; margin-top: 2.5px" src="{{ url('/img/car-round.png') }}"/>
    <div class="car-item-container" style="">
        <div class="car-item">{{$car->brand}}</div>
        <div class="car-item">{{$car->model}}</div>
        <div class="car-item">{{$car->car_year}}</div>
        <a href=" {{ route('carInfo', ['id' => $car->id]) }}" style="color: brown">SZCZEGOLY</a>
    </div>
    <form style="margin-bottom: 0; margin-right: 5px" method="post" action="/cars/{{$car->id}}">
        @method('delete')
        @csrf
        <button class="car-item car-item-btn" style="color: red" onclick="return confirm('Czy na pewno chcesz usunąć te auto?')">❌</button>
    </form>
</div>
