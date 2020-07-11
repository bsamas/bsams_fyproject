<?php

namespace App\Http\Controllers;

use App\Course;
use App\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
      public function getAllCourses()
    {
        $courses = Course::all();
        // return response()->json(['courses' => $courses]);
        return view('course.viewcourse', compact('courses'));
    }

    public function getSingleCourse($courseId)
    {
        $course = Course::find($courseId);

        if (!$course) return response()->json(['error' => 'Course not found']);

        $course->courses;

        return response()->json(['course' => $course]);
    }

    public function postCourse(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'code'=>'required | unique:courses',
            'course_name'=>'required',
            'semester'=>'required',
            'year'=>'required',
            'programme_id'=>'required'

        ]);
        if($validator->fails()){
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);
        }

        $programme = Programme::find($request->programme_id);

        $course=new Course();
        $course->code=$request->input('code');
        $course->course_name=$request->input('course_name');
        $course->semester=$request->input('semester');
        $course->year=$request->input('year');
        // $course->programme_id=$request->input('programme_id');

        $programme->save([$course]);
        // return response()->json(['course' => $course],200);
        return redirect('/course')->with('message', 'course registered successfully');
    }

     public function putCourse(Request $request, $courseId)
    {

          $validator=Validator::make($request->all(),
        [

            'code'=>'required ',
            'course_name'=>'required',
            'semester'=>'required',
            'year'=>'required',
            'programme_id'=>'required'

        ]);


        if($validator->fails())
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);

        $course = Course::find($courseId);

        if(!$course)  return response()->json(['error'=>'course not found']);

        $course->update([
            'code'=> $request->code,
            'course_name'=> $request->course_name,
            'semester'=> $request->semester,
            'year'=> $request->year,
            'programme_id'=> $request->programme_id

        ]);


        // $course->update($request->all());
    }

    public function deleteCourse($courseId)
    {

        $course = Course::find($courseId);

        if (!$course) return response()->json(['error' => 'course not found']);

        $course->delete();

        return response()->json(['message' => 'course deleted successfully!']);
    }
}





