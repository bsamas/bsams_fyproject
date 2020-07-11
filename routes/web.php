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
Route::get('/ staff', function() {
    return view('staff.staff');
});

Route::post('/Staffpost', 'StaffController@postStaff');
Route::get('/showstaff', 'StaffController@getAllstaff')->name('showstaff');

//course route

Route::get('/ course', function() {
    $programmes = Programme::all();
    return view('course.course')->with([
        'programmes' => $programmes
    ]);

});

Route::post('/postCourse', 'CourseController@postCourse');
Route::get('/viewcourse', 'CourseController@getAllCourses')->name('viewcourse');



Route::get('/ department', function() {
    return view('department.department');
});

Route::post('/postdepartment', 'DepartmentController@postDepartment');
Route::get('/registereddepartment', 'DepartmentController@getAllDepartments')->name('registereddepartment');


Route::get('/programme', function() {
    return view('programme.programme');
});

 Route::post('/postprogramme','ProgrammeController@postProgramme');
 Route::get('viewprogramme', 'ProgrammeController@getAllProgrammes')->name('viewprogramme');




Route::get('report', 'AttendanceController@getAllAttendances')->name('report');





// //for employees
// Route::get('/index', 'EmployeeController@index')->name('employees.index');
// Route::get('/employees/{id}/edit','EmployeeController@edit')->name('employees.edit');
// Route::get('/employees/{id}/delete','EmployeeController@destroy')->name('employees.destroy');
// Route::get('/create','EmployeeController@create')->name('employees.create');
// Route::post('/create','EmployeeController@store')->name('employees.store');
// Route::post('/employee/update','EmployeeController@update')->name('employees.update');

