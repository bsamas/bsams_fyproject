<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\StudentController;
use App\Programme;
use App\StudentView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function() {

    //routes for student details#

Route::get('/student', ['uses'=>'StudentController@getAllStudents']);
Route::post('/student', ['uses'=>'StudentController@postStudent']);
Route::post('/student/{id}', 'StudentController@editStudent');
Route::get('/delete_student/{id}', 'StudentController@delete');

//staff routes
Route::get('/staff', ['uses'=>'StaffController@getAllStaff']);
Route::post('/Staffpost', 'StaffController@postStaff');
Route::get('/showstaff', 'StaffController@getAllstaff')->name('showstaff');

//course route

Route::get('/course', ['uses'=>'CourseController@getAllCourses']);
Route::post('/course', ['uses' => 'CourseController@postCourse']);
Route::post('/edit_course/{id}', 'CourseController@editCourse');
Route::get('/delete_course/{id}', 'CourseController@delete');

//departmnte
Route::get('/department', ['uses'=>'DepartmentController@getAllDepartments']);
Route::post('/department', ['uses'=>'DepartmentController@postDepartment']);
Route::post('/edit_department/{id}', 'DepartmentController@edit');
Route::get('/delete_department/{id}', 'DepartmentController@delete');



Route::get('/attendance', ['uses'=>'AttendanceController@getAllAttendances']);
Route::get('/report', ['uses'=>'AttendanceController@getAllReports']);




Route::get('/programme', ['uses'=>'ProgrammeController@getAllProgrammes']);
Route::post('/postprogramme','ProgrammeController@postProgramme');
Route::post('/edit_programme/{id}', 'ProgrammeController@edit');
Route::get('/delete_programme/{id}', 'ProgrammeController@delete');

});
