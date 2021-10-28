<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController2 extends Controller
{
    // brand, model, owner_id

    public function create () {
        $owners = DB::table('owners')->get();

        return view('car.create')->with('owners', $owners);
    }


    public function store (Request $request) {
        $brand = $request['brand'];
        $model = $request['model'];
        $owner_id = $request['owner_id'];

        $result = DB::table('cars')->insert(['brand' => $brand, 'model' => $model, 'owner_id' => $owner_id]);

        return redirect()->back();
    }


    public function index () {
        // id, brand, model, owner_id

        // car: id, brand, model .. owner: name


        /*
            select cars.*, owners.name as owner_name 
            from cars 
            left join owners on cars.owner_id = owners.id
        */

        $cars = DB::table('cars')
                ->leftJoin('owners', 'cars.owner_id', 'owners.id')
                ->select('cars.*', 'owners.name as owner_name')
                ->orderBy('cars.id', 'DESC')
                ->get();

        return view('car.index')->with('cars', $cars);
    }



    public function edit ($id) {
        // select * from cars where id = $id limit 1

        // $car = DB::table('cars')
        //         ->where('id', '=', $id)
        //         ->limit(1);
        
        $car = DB::table('cars')
                // ->where('id', '=', $id)
                ->where('id', '=', $id)
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

        $result = DB::table('cars')
                ->where('id', $id)
                ->update(['brand' => $brand, 'model' => $model, 'owner_id' => $owner_id]);

        return redirect()->back();
    }


    public function destroy ($id) {
        $result = DB::table('cars')->where('id', $id)->delete();
        return redirect()->back();
    }
}
