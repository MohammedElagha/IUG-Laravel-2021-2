<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\StudentController;

class CourseController extends Controller
{
    public function get_courses ($id) {
        $courses = [['id' => 'MOBC 5674', 'name' => 'Android 1'],
                    ['id' => 'WDDM 5477', 'name' => 'Adnimation'],
                    ['id' => 'SDEV 7874', 'name' => 'OS' ]];

        return view('courses.view')->with('courses', $courses)->with('id', $id);
    }
}
