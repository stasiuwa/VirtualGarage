<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Post;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = DB::table('posts')->where('user_id','=',Auth::id())->limit('6')->orderBy('mileage', 'desc')->get();
        $cars = DB::table('cars')->where('user_id','=', Auth::id())->get();
        return view('/cars/index', ['cars' => $cars, 'posts' => $posts]);
    }
    public function create(Request $request) {

    }
    public function show(int $id)
    {

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => ['required', 'string','max:30'],
            'model' => ['required', 'string', 'max:30'],
            'car_year' => ['required', 'integer','min:1886', 'max:' . date("Y")],
            'engine' => ['required', 'string','max:20'],
            'mileage' => ['required', 'integer'],
            'version' => ['nullable', 'string', 'max:16'],
            'generation' => ['nullable', 'string', 'max:16'],
            'drive' => ['nullable', 'string','max:5'],
            'vin' => ['nullable', 'string', 'max:17', 'min:17'],
            'engine_cap' => ['nullable', 'integer', 'max:32000', 'min:0'],
            'fuel' => ['nullable', 'string', 'max:16'],
            'power' => ['nullable', 'integer', 'max:32000', 'min:0'],
            'torque' => ['nullable', 'integer', 'max:32000', 'min:0'],
            'paint_code' => ['nullable', 'integer', 'min:0'],
            'reg_plate' => ['nullable', 'string', 'max:16'],
            'service_date' => ['nullable', 'date'],
            'insurance' => ['nullable', 'string', 'max:16'],
            'insurance_pay_time' => ['nullable', 'date'],
            'insurance_price' => ['nullable', 'gte:0']
        ]);

        $car = new Car;
        $car->user_id=Auth::id();
        $car->brand=$request->input('brand');
        $car->model=$request->input('model');
        $car->car_year=$request->input('car_year');
        $car->engine=$request->input('engine');
        $car->mileage=$request->input('mileage');

//        domyslne wartosci
        $car->version="";
        $car->generation="";
        $car->drive="";
        $car->vin="";
        $car->engine_cap=0;
        $car->fuel="";
        $car->power=0;
        $car->torque=0;
        $car->paint_code=0;
        $car->reg_plate="";
        $car->service_date=date("Y-m-d");
        $car->insurance="";
        $car->insurance_pay_time=date("Y-m-d");
        $car->insurance_price=0;

        $car->save();

        return redirect('cars')->with('success', "Dodano auto do garażu.");
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $car = Car::find($id);
        return view('cars/edit', ['car' => $car]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        $newCar = $request->validate([
            'brand' => ['required', 'string','max:30'],
            'model' => ['required', 'string', 'max:30'],
            'car_year' => ['required', 'integer','min:1886', 'max:' . date("Y")],
            'engine' => ['required', 'string','max:20'],
            'mileage' => ['required', 'integer'],
            'version' => ['string', 'max:16'],
            'generation' => ['string', 'max:16'],
            'drive' => ['string','max:5'],
            'vin' => ['string', 'max:17', 'min:17'],
            'engine_cap' => ['integer', 'max:32000', 'min:0'],
            'fuel' => ['string', 'max:16'],
            'power' => ['integer', 'max:32000', 'min:0'],
            'torque' => ['integer', 'max:32000', 'min:0'],
            'paint_code' => ['integer', 'min:0'],
            'reg_plate' => ['string', 'max:16'],
            'service_date' => ['date'],
            'insurance' => ['string', 'max:16'],
            'insurance_pay_time' => ['date'],
            'insurance_price' => ['gte:0']
        ]);

        try{
            $oldCar = Car::find($id);
            if($oldCar){
                $oldCar->brand=$newCar['brand'];
                $oldCar->model=$newCar['model'];
                $oldCar->car_year=$newCar['car_year'];
                $oldCar->engine=$newCar['engine'];
                $oldCar->mileage=$newCar['mileage'];

                $oldCar->version=$newCar['version'];
                $oldCar->generation=$newCar['generation'];
                $oldCar->drive=$newCar['drive'];
                $oldCar->vin=$newCar['vin'];
                $oldCar->engine_cap=$newCar['engine_cap'];
                $oldCar->fuel=$newCar['fuel'];
                $oldCar->power=$newCar['power'];
                $oldCar->torque=$newCar['torque'];
                $oldCar->paint_code=$newCar['paint_code'];
                $oldCar->reg_plate=$newCar['reg_plate'];
//                $oldCar->service_date=$newCar['service_date'];
                $oldCar->insurance=$newCar['insurance'];
//                $oldCar->insurance_pay_time=$newCar['insurance_pay_time'];
                $oldCar->insurance_price=$newCar['insurance_price'];

                $oldCar->save();
            }
            return redirect('cars/' . $id . '/details');
        }catch (UniqueConstraintViolationException) {
            return redirect('cars')->withErrors(['id' => 'Niepoprawne id samochodu'])->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $car = Car::find($id);
        if($car->user_id == Auth::id()){
            $car->delete();
        }
        return redirect('/cars');
    }
}
