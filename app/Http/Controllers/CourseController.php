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
        return view('course.coursedetails', compact('courses'));
    }

    public function getSingleCourse($coursesId)
    {
        $courses = Course::find($coursesId);

        if (!$courses) return response()->json(['error' => 'Course not found']);

        $courses->courses;

        return response()->json(['course' => $courses]);
    }

    public function postCourse(Request $request)
    {

       
        $code= new Course;
          
        // logic that check if the course exists but deleted then restore instead of dublicating
$check = Course::where('code', $code)->where('deleted_at', '!=', null)->withTrashed();

        if($check->exists()){
             $check->first()->restore();

            return redirect('/coursedetails')->with('message', 'course submitted');

        }

        else{
            if(Course::where('code', $code)->exists()){
                return redirect('/coursedetails')->with('error', 'course exists ');
            }
            else{

                $courses = new Course;
                $courses->code = $request->input('code');
                $courses->course_name=$request->input('course_name');
                $courses->semester=$request->input('semester');
                $courses->year=$request->input('year');
        
                 $courses->save();

                 return redirect('/coursedetails')->with('message', 'course added successfully ');
            }
        }
    }
    //     $validator=Validator::make($request->all(),
    //     [
    //         'code'=>'required | unique:courses',
    //         'code'=>'required',
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

    //     $courses=new Course();
    //     $courses->code=$request->input('code');
    //     $courses->code=$request->input('code');
    //     $courses->semester=$request->input('semester');
    //     $courses->year=$request->input('year');
    //     // $courses->programme_id=$request->input('programme_id');

    //     $programme->save([$courses]);
    //     // return response()->json(['course' => $courses],200);
    //     return redirect('/course')->with('message', 'course registered successfully');
    // }

     public function putCourse(Request $request, $coursesId)
    {

          $validator=Validator::make($request->all(),
        [

            'code'=>'required ',
            'code'=>'required',
            'semester'=>'required',
            'year'=>'required',
            // 'programme_id'=>'required'

        ]);


        if($validator->fails())
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);

        $courses = Course::find($coursesId);

        if(!$courses)  return response()->json(['error'=>'course not found']);

        $courses->update([
            'code'=> $request->code,
            'code'=> $request->code,
            'semester'=> $request->semester,
            'year'=> $request->year,
            // 'programme_id'=> $request->programme_id

        ]);


        // $courses->update($request->all());
    }

    public function deleteCourse($coursesId)
    {

        $courses = Course::find($coursesId);

        if (!$courses) return response()->json(['error' => 'course not found']);

        $courses->delete();

        return response()->json(['message' => 'course deleted successfully!']);
    }

     public function edit($id, Request $request){
        $courses = Course::where('id', $id)->first();
        $courses->code = $request->input('code');
        $courses->save();

        return redirect('/coursedetails')->with('message', 'course updated successfully');
    }

    public function delete($id){
        Course::find($id)->delete();
        return redirect('/coursedetails')->with('message', 'course deleted successfully');
    }
}





