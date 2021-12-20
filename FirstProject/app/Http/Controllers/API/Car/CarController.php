<?php

namespace App\Http\Controllers\API\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    public function index () {
        $list = Car::all();

        $status = true;

        // return response()->json($this->sendResponse(status: true, message: "", data: $list));
        return response()->json($this->sendResponse($status=$status, $message="", $data=$list));
    }



    public function store () {
        $brand = request('brand');
        $model = request('model');
        $owner_id = request('owner_id');

        $car = new Car;
        $car->brand = $brand;
        $car->model = $model;
        $car->owner_id = $owner_id;
        $result = $car->save();

        return response()->json($this->sendResponse($result, (($result)?"sccuess":"failed"), $car));
    }
}
