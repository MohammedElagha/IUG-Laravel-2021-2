<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Car;
use App\Http\Requests\AddCarRequest;
use Illuminate\Support\Facades\Storage;
use Session;

class CarController6 extends Controller
{
    // brand, model, owner_id

    public function create () {
        // Session::put(['name' => 'Ahmed', 'id' => 55]);
        session()->put(['name' => 'Ahmed', 'id' => 55]);

        $owners = Car::all();

        return view('car.create')->with('owners', $owners);
    }


    public function store (Request $request) {
        $brand = $request['brand'];     // Request::get('brand')  ,, request('brand')
        $model = $request['model'];
        $owner_id = $request['owner_id'];

        // $result = Car::insert(['brand' => $brand, 'model' => $model, 'owner_id' => $owner_id]);

        $file = $request->file('image');

        $file_name = time() . rand(1, 100000000000000);
        $ext = $file->getClientOriginalExtension();
        $path = "uploads/cars/$file_name.$ext";

        Storage::disk('local')->put($path, file_get_contents($file));

        if (file_exists(storage_path("app/$path"))) {

        }

        $car = new Car;
        $car->brand = $brand;
        $car->model = $model;
        $car->owner_id = $owner_id;
        $car->image = $path;
        $result = $car->save();

        return redirect()->back()->with('status', $result);
    }


    public function index () {

    $user_name = session('name');
    // dd($user_name);
        
    $car_brand = 'BMW';

    $cars = Car::withTrashed()
        ->leftJoin('owners', function ($join) {
            $join->on('cars.owner_id', 'owners.id');
            $join->whereNotNull('owners.phone');
        })

        // ->where(function ($query) use ($car_brand) {
        //     $query->where('cars.brand', $car_brand)
        //             ->where('cars.model', 'X5');
        // })
        // ->orWhere(function ($query) {
        //     $query->where('cars.brand', 'MW')
        //             ->orWhere(function ($query) {
        //                 $query->whereNotNull('cars.owner_id');
        //                 $query->whereNotNull('owners.phone');
        //             });
        // })
        // ->whereRaw('')
        ->select('cars.*', 'owners.name as owner_name', DB::raw("CONCAT(cars.brand, '-', cars.model) as description"))
        ->paginate(3);

        return view('car.index')->with('cars', $cars)->with('user_name', $user_name);
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
        $result = Car::withTrashed()->where('id', $id)->restore();
        return redirect()->back();
    }
}
        
        