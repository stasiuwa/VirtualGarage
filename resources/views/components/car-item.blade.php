
<div style="display: flex;">
    <img style="max-width: 3vw; margin-left: 1vw; margin-right: 2vw; margin-top: 0.25vw" src="{{ url('/img/car-round.png') }}"/>
    <div class="car-item-container" style="">
        <div class="car-item">{{$car->brand}}</div>
        <div class="car-item">{{$car->model}}</div>
        <div class="car-item">{{$car->car_year}}</div>
        <a href=" {{ route('carInfo', ['id' => $car->id]) }}"><button class="car-item car-item-btn" style="color: #ff4c4c">SZCZEGOLY</button></a>
        <form style="margin-bottom: 0" method="post" action="/cars/{{$car->id}}">
            @method('delete')
            @csrf
            <button class="car-item car-item-btn" style="color: red">USUŃ</button>
        </form>
    </div>
</div>
