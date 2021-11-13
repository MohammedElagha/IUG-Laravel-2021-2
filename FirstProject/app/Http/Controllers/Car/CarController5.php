<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Car;

class CarController5 extends Controller
{
    // brand, model, owner_id

    public function create () {
        $owners = Car::all();

        return view('car.create')->with('owners', $owners);
    }


    public function store (Request $request) {
        $brand = $request['brand'];
        $model = $request['model'];
        $owner_id = $request['owner_id'];

        // $result = Car::insert(['brand' => $brand, 'model' => $model, 'owner_id' => $owner_id]);

        $car = new Car;
        $car->brand = $brand;
        $car->model = $model;
        $car->owner_id = $owner_id;
        $result = $car->save();

        return redirect()->back();
    }


    public function index () {
        
    $car_brand = 'BMW';

    $cars = Car::with('owner')->get();

    return view('car.index2')->with('cars', $cars);
    }



    public function edit ($id) {        
        $car = Car::where('id', '=', $id)
                ->where('cars.brand', 'LIKE', '%BMW')
                ->whereNull('cars.owner_id')
                ->whereNotNull('cars.brand')
                ->first();

        $owners = DB::select("select * from owners");

        return view('car.edit')->with('car', $car)->with('owners', $owners);
    }


    public function update (Request $request, $id) {
        $brand = $request['brand'];
        $model = $request['model'];
        $owner_id = $request['owner_id'];

        // $result = Car::where('id', $id)
        //         ->update(['brand' => $brand, 'model' => $model, 'owner_id' => $owner_id]);

        // $car = Car::where('id', $id)->first();
        $car = Car::find($id);
        $car->brand = $brand;
        $car->model = $model;
        $car->owner_id = $owner_id;
        $result = $car->save();

        return redirect()->back();
    }


    public function destroy ($id) {
        // $result = Car::where('id', $id)->delete();

        $car = Car::find($id);
        $result = $car->delete();
        return redirect()->back();
    }


    public function restore ($id) {
        $result = Car::where('id', $id)->restore();

        // $car = Car::find($id);
        // $result = $car->restore();
        return redirect()->back();
    }
}
        
        