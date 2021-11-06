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
    /*
    owners: id, name, phone
    cars: id, brand, model, owner_id
    
    select cars.*, owners.name as owner_name, CONCAT(cars.brand, '-', cars.model) as description
    from cars 
    left join owners on (cars.owner_id = owners.id and owners.phone is not null)
    where (cars.brand = 'BMW' and cars.model = 'X5')
    or (cars.brand = 'MB' or (cars.owner_id is not null and owners.phone is not null))
    */
        
    $car_brand = 'BMW';

    $cars = DB::table('cars')
        ->leftJoin('owners', function ($join) {
            $join->on('cars.owner_id', 'owners.id');
            $join->whereNotNull('owners.phone');
        })

        ->where(function ($query) use ($car_brand) {
            $query->where('cars.brand', $car_brand)
                    ->where('cars.model', 'X5');
        })
        ->orWhere(function ($query) {
            $query->where('cars.brand', 'MW')
                    ->orWhere(function ($query) {
                        $query->whereNotNull('cars.owner_id');
                        $query->whereNotNull('owners.phone');
                    });
        })
        // ->whereRaw('')
        ->select('cars.*', 'owners.name as owner_name', DB::raw("CONCAT(cars.brand, '-', cars.model) as description"))
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
        
        