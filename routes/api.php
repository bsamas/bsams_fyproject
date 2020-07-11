<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//api for students
Route::get('students',['uses'=>'StudentController@getAllStudents']);
Route::get('student/{studentId}',['uses'=>'StudentController@getSingleStudent']);
Route::post('student',['uses'=>'StudentController@postStudent']);
Route::put('student/{studentId}',['uses'=>'StudentController@putStudent']);
Route::delete('student/{studentId}',['uses'=>'StudentController@deleteStudent']);


//api for courses
Route::get('courses',['uses'=>'CourseController@getAllCourses']);
Route::get('course/{courseId}',['uses'=>'CourseController@getSingleCourse']);
Route::post('course',['uses'=>'CourseController@postCourse']);
Route::put('course/{courseId}',['uses'=>'CourseController@putCourse']);
Route::delete('course/{coursetId}',['uses'=>'CourseController@deleteCourse']);

//api for department
Route::get('departments',['uses'=>'DepartmentController@getAllDepartments']);
Route::get('department/{departmentId}',['uses'=>'DepartmentController@getSingleDepartment']);
Route::post('department',['uses'=>'DepartmentController@postDepartment']);
Route::put('department/{departmentId}',['uses'=>'DepartmentController@putDepartment']);
Route::delete('department/{departmentId}',['uses'=>'DepartmentController@deleteDepartment']);

// //api for Staffs
Route::get('staffs',['uses'=>'StaffController@getAllStaffs']);
Route::get('staff/{staffId}',['uses'=>'StaffController@getSingleStaff']);
Route::post('staff',['uses'=>'StaffController@postStaff']);
Route::put('staff/{staffId}',['uses'=>'StaffController@putStaff']);
Route::delete('staff/{staffId}',['uses'=>'StaffController@deleteStaff']);

//api for room
Route::get('rooms',['uses'=>'RoomController@getAllRooms']);
Route::get('room/{roomId}',['uses'=>'RoomController@getSingleRoom']);
Route::post('room',['uses'=>'RoomController@postRoom']);
Route::put('room/{roomId}',['uses'=>'RoomController@putRoom']);
Route::delete('room/{roomId}',['uses'=>'RoomController@deleteRoom']);

// //api for attendances
Route::get('attendances',['uses'=>'AttendanceController@getAllAttendances']);
Route::get('attendance/{attendanceId}',['uses'=>'AttendanceController@getSingleAttendance']);
Route::post('attendance',['uses'=>'AttendanceController@postAttendance']);
Route::put('attendance/{attendanceId}',['uses'=>'AttendanceController@putAttendance']);
Route::delete('attendance/{attendanceId}',['uses'=>'AttendanceController@deleteAttendance']);

//api for programme
Route::get('programmes',['uses'=>'ProgrammeController@getAllProgrammes']);
Route::get('programme/{programmeId}',['uses'=>'ProgrammeController@getSingleProgramme']);
Route::post('programme',['uses'=>'ProgrammeController@postProgramme']);
Route::put('programme/{programmeId}',['uses'=>'ProgrammeController@putProgramme']);
Route::delete('programme/{programmeId}',['uses'=>'ProgrammeController@deleteProgramme']);
