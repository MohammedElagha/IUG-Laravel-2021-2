<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    public function create () {
        return view('owner.create');
    }

    public function store (Request $request) {
        $name = $request['name'];
        $phone = $request['phone'];

        $query = "insert into owners (name, phone) values ('$name', $phone)";

        // statement, insert
        $result = DB::statement($query);
        // bool

        return redirect()->back();
    }

    public function index () {
        $query = "select * from owners";


        // query, select
        $data = DB::select($query);

        return view('owner.index')->with('owners', $data);
    }
}
