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

    //   $course_name = $request->input('course_name');
      $course_name = $request->input('course_name');

        // logic that check if the programme exists but deleted then restore instead of dublicating
$check = Course::where('course_name', $course_name)->where('deleted_at', '!=', null)->withTrashed();

        if($check->exists()){
             $check->first()->restore();

            return redirect('/viewcourse')->with('message', 'course submitted');

        }

        else{
            if(Course::where('course_name', $course_name)->exists()){
                return redirect('/viewcourse')->with('error', 'course exists ');
            }
            else{

                $course = new Course;
                $course->course_name = $request->input('course_name');


                 $course->save();


                 return redirect('/viewcourse')->with('message', 'course added successfully ');
            }
        }
    }
    //     $validator=Validator::make($request->all(),
    //     [
    //         'course_name'=>'required | unique:courses',
    //         'course_name'=>'required',
    //         'semester'=>'required',
    //         'year'=>'required',
    //         'programme_id'=>'required'

    //     ]);
    //     if($validator->fails()){
    //         return response()->json([
    //             'error'=>$validator->errors(),
    //             'message'=>$validator->errors()->first()
    //         ],404);
    //     }

    //     $programme = Programme::find($request->programme_id);

    //     $course=new Course();
    //     $course->course_name=$request->input('course_name');
    //     $course->course_name=$request->input('course_name');
    //     $course->semester=$request->input('semester');
    //     $course->year=$request->input('year');
    //     // $course->programme_id=$request->input('programme_id');

    //     $programme->save([$course]);
    //     // return response()->json(['course' => $course],200);
    //     return redirect('/course')->with('message', 'course registered successfully');
    // }

     public function putCourse(Request $request, $courseId)
    {

          $validator=Validator::make($request->all(),
        [

            'course_name'=>'required ',
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
            'course_name'=> $request->course_name,
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

     public function edit($id, Request $request){
        $course = Course::where('id', $id)->first();
        $course->course_name = $request->input('course_name');
        $course->save();

        return redirect('/viewcourse')->with('message', 'course updated successfully');
    }

    public function delete($id){
        Course::find($id)->delete();
        return redirect('/viewcourse')->with('message', 'course deleted successfully');
    }
}





