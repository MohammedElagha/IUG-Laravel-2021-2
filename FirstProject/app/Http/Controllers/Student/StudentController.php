<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index () {
        // do something
    }


    public function store (Request $request, $p) {
        // id, name, nationality

        /////////////

        // get data (body, params) as assoc array
        $name = $request['name'];
        $id = $request['id'];
        $nationality = $request['nationality'];

        // get data (body, params) as helper function
        $name = request('name');


        //////////////

        // get data from params
        $name = $request->query('name');
        $lang = $request->query('lang');


        //////////////

        // get header
        $user_agent = $request->header('User-Agent');





        //////////////////////


        // $request, request()
        if ($request->has('id')) {

        }
        if (request()->has('id')) {

        }

        if ($request->query->has('name')) {

        }

        if ($request->headers->has('user_agent')) {

        }

        // return redirect('student/create');
        return redirect()->back();
    }


    public function create () {
        $nationalities = ['EGY' => 'Egyption', 'SYR' => 'Syrian'];
        return view('student.create')->with('p', 5)->with('nationalities', $nationalities);
    }
}
