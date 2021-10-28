<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    // brand, model, owner_id

    public function create () {
        $owners = DB::select("select * from owners");
        return view('car.create')->with('owners', $owners);
    }


    public function store (Request $request) {
        $brand = $request['brand'];
        $model = $request['model'];
        $owner_id = $request['owner_id'];

        $query = "insert into cars (brand, model, owner_id) value ('$brand', '$model', $owner_id)";

        $result = DB::statement($query);

        return redirect()->back();
    }


    public function index () {
        // id, brand, model, owner_id

        // car: id, brand, model .. owner: name


        $query = "select cars.*, owners.name as owner_name from cars left join owners on cars.owner_id = owners.id";

        $cars = DB::select($query);

        return view('car.index')->with('cars', $cars);
    }



    public function edit ($id) {
        $query = "select * from cars where id = $id";
        $car = DB::select($query)[0] ?? null;

        $owners = DB::select("select * from owners");

        return view('car.edit')->with('car', $car)->with('owners', $owners);
    }


    public function update (Request $request, $id) {
        $brand = $request['brand'];
        $model = $request['model'];
        $owner_id = $request['owner_id'];

        if ($brand = $request['brand']) {

        }

        $query = "update cars set brand = '$brand', model = '$model' , owner_id = $owner_id where id = $id";

        $result = DB::statement($query);

        return redirect()->back();
    }


    public function destroy ($id) {
        $query = "delete from cars where id = $id";
        $result = DB::statement($query);
        return redirect()->back();
    }
}
