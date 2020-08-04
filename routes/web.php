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


//routes for student details#


Route::get('/ student', function() {
    return view('student.student');
});

Route::post('/Studentpost', 'StudentController@postStudent');
Route::get('/viewstudent', 'StudentController@getAllStudents')->name('viewstudent');


//staff routes
Route::get('/staff', ['uses'=>'StaffController@getAllStaff']);
Route::post('/Staffpost', 'StaffController@postStaff');
Route::get('/showstaff', 'StaffController@getAllstaff')->name('showstaff');

//course route

Route::get('/course', ['uses'=>'CourseController@getAllCourses']);

Route::post('/postcourse', 'CourseController@postCourse');
Route::get('/coursedetails', 'CourseController@getAllCourses')->name('course');
Route::post('/edit_course/{id}', 'CourseController@edit');
Route::get('/delete_course/{id}', 'CourseController@delete');


Route::get('/department', ['uses'=>'DepartmentController@getAllDepartments']);

Route::post('/postdepartment', 'DepartmentController@postDepartment');
Route::get('/registereddepartment', 'DepartmentController@getAllDepartments')->name('registereddepartment');
Route::post('/edit_department/{id}', 'DepartmentController@edit');
Route::get('/delete_department/{id}', 'DepartmentController@delete');



// Route::get('/component', function() {
//     return view('component.registration');

// });

// Route::get('/component', function() {
//     return view('component.attendance_menu');

// });


// Route::get('/compo', function() {
//     return view('attendance.attend_details');
// });


Route::get('/attendance', ['uses'=>'AttendanceController@getAllAttendances']);




Route::get('/programme', ['uses'=>'ProgrammeController@getAllProgrammes']);
Route::get('/viewprogramme', 'ProgrammeController@getAllProgrammes');

Route::post('/postprogramme','ProgrammeController@postProgramme');
Route::post('/edit_programme/{id}', 'ProgrammeController@edit');
Route::get('/delete_programme/{id}', 'ProgrammeController@delete');






