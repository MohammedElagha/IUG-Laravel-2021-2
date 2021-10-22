<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('first/course', function () {
    $courses = [['id' => 'MOBC-11', 'name' => 'Web'],
            ['id' => 'WDDM-11', 'name' => '3D']];

    $name = 'Hala';    

    return view('first')->with('student_name', $name)->with('courses', $courses);
});


Route::get('student/grades', function () {
    return view('student.grades');
});


// Route::get('course/view', function () {
//     return view('courses.view');
// });

Route::get('course/create', function () {
    return view('courses.create');
});


Route::get('student/index', 'Student\StudentController@index');

Route::get('course/view/collage/filter', 'CourseController@search');
Route::get('course/view/{id}/{name}', 'CourseController@get_courses');


Route::get('student/profile/{id}', 'StudenController@profile');
Route::get('student/{id}/profile', 'StudentController@profile');


Route::get('student/create', 'Student\StudentController@create');
Route::post('student/store/{p}', 'Student\StudentController@store');


Route::get('owner/create', 'Owner\OwnerController@create');
Route::post('owner/store', 'Owner\OwnerController@store');
Route::get('owner', 'Owner\OwnerController@index');

Route::get('car/create', 'Car\CarController@create');