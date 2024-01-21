<?php

namespace App\Http\Controllers;

use App\Models\Car;
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
        $cars = DB::table('cars')->where('user_id','=', Auth::id())->get();
        return view('/cars/index', ['cars' => $cars]);
    }
    public function create(Request $request) {

    }
    public function show(int $id)
    {
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => ['required', 'string','max:16'],
            'model' => ['required', 'string', 'max:16'],
            'car_year' => ['required', 'integer','min:1886', 'max:' . date("Y")],
            'engine' => ['required', 'string','max:16'],
            'mileage' => ['required', 'integer', 'max:8000000']
        ]);

        $car = new Car;
        $car->user_id=Auth::id();
        $car->brand=$request->input('brand');
        $car->model=$request->input('model');
        $car->car_year=$request->input('car_year');
        $car->engine=$request->input('engine');
        $car->mileage=$request->input('mileage');
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
            'mileage' => ['required', 'integer']
        ]);

        try{
            $oldCar = Car::find($id);
            if($oldCar){
                $oldCar->brand=$newCar['brand'];
                $oldCar->model=$newCar['model'];
                $oldCar->car_year=$newCar['car_year'];
                $oldCar->engine=$newCar['engine'];
                $oldCar->mileage=$newCar['mileage'];
                $oldCar->save();
            }
            return redirect('cars/' . $id . '/details');
        }catch (UniqueConstraintViolationException $e) {
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
