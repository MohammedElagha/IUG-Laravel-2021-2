<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function create () {
        $owners = DB::select("select * from owners");
        return view('car.create')->with('owners', $owners);
    }
}
