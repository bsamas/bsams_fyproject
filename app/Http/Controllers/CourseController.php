<?php

namespace App\Http\Controllers;

use App\Course;
use App\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\request as REQ;

class CourseController extends Controller
{
       public function getAllCourses()
    {
        $courses = Course::all();
        $programmes = Programme::all();
        if(REQ::is('api/*'))
        return response()->json(['courses' => $courses, 'programmes' => $programmes]);
        return view('course.coursedetails', compact('courses','programmes'));
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

        $validator=Validator::make($request->all(),
        [
            'code'=>'required | unique:courses',
            'course_name'=>'required',
            'semester'=>'required',
            'class'=>'required',
            'programme_id'=>'required'
        ]);
        //  if($validator->fails()){
        //     return redirect('/coursedetails')->with('message', 'course exists'
        //        );
        // }
          
        // logic that check if the course exists but deleted then restore instead of dublicating
$check = Course::where('code', $code)->where('deleted_at', '!=', null)->withTrashed();

        if($check->exists()){
             $check->first()->restore();
            return redirect('/course')->with('message', 'course submitted');

        }

        else{
            if($validator->fails()){
                return redirect('/course')->with('message', 'course already exists ');
            }
            else{

                $courses = new Course;
                $courses->code = $request->input('code');
                $courses->course_name=$request->input('course_name');
                $courses->semester=$request->input('semester');
                $courses->class=$request->input('class');
                $courses->programme_id=$request->input('programme_id');
        
                 $courses->save();

                 return redirect('/course')->with('message', 'course added successfully ');
            }
        }
    }
    
    

     public function editCourse(Request $request, $id)
    {

          $validator=Validator::make($request->all(),
        [

            'code'=>'required ',
            'course_name'=>'required',
            'semester'=>'required',
            'class'=>'required',
            'programme_id'=>'required'

        ]);


        if($validator->fails())
            return redirect('/course')->with([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);

        $courses = Course::find($id);

        if(!$courses)  return redirect('/course')->with(['error'=>'course not found']);

        $courses->update([
            'code'=> $request->code,
            'course_name'=> $request->course_name,
            'semester'=> $request->semester,
            'class'=> $request->class,
            'programme_id'=> $request->programme_id

        ]);


        // $courses->update($request->all());
        $courses->save();

        return redirect('/course')->with('message', 'course updated successfully');
    }


    public function deleteCourse($id)
    {

        $courses = Course::find($id);

        if (!$courses) return response()->json(['error' => 'course not found']);

        $courses->delete();

        return response()->json(['message' => 'course deleted successfully!']);
    }

    //  public function edit($id, Request $request){
    //     $courses = Course::where('id', $id)->first();
    //     $courses->code = $request->input('code');
    //     $courses->course_name = $request->input('course_name');
    //     $courses->semester = $request->input('semester');
    //     $courses->class = $request->input('class');
        
    //     $courses->save();

    //     return redirect('/coursedetails')->with('message', 'course updated successfully');
    // }

    public function delete($id){
        Course::find($id)->delete();
        return redirect('/course')->with('message', 'course deleted successfully');
    }
}





