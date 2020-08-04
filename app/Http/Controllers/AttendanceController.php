<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function getAllAttendances()
    {
        $attendances = Attendance::all();
        $courses = Course::all();

        return view('attendance.report', compact('attendances', 'courses'));
    }

    public function getSingleAttendance($attendanceId)
    {
        $attendance = Attendance::find($attendanceId);

        if (!$attendance) return response()->json(['error' => 'Attendance not found']);

        $attendance->attendances;

        return response()->json(['attendance' => $attendance]);
    }

    public function postAttendance(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'status'=>'required',
            'type'=>'required',
            'time'=>'required',
            'count'=>'required',
            'date'=>'required'

        ]);
        if($validator->fails()){
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);
        }
        $attendance=new Attendance();
        $attendance->status=$request->input('status');
        $attendance->type=$request->input('type');
        // $attendance->time=$request->input('time');
        $attendance->course_id=$request->input('course_id');
        $attendance->count=$request->input('count');

        $attendance->save();
        return response()->json(['attendance' => $attendance],200);
    }

     public function putAttendance(Request $request, $attendanceId)
    {

          $validator=Validator::make($request->all(),
        [
            'status'=>'required',
            'type'=>'required',
            'time'=>'required',
            'count'=>'required',
            'date'=>'required'

        ]);


        if($validator->fails())
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);

        $attendance = Attendance::find($attendanceId);

        if(!$attendance)  return response()->json(['error'=>'attendance not found']);

        $attendance->update([
            'status'=> $request->status,
            'type'=> $request->type,
            'count'=> $request->count,
            'date'=> $request->date

        ]);


        // $attendance->update($request->all());
    }

    public function deleteAttendance($attendanceId)
    {

        $attendance = Attendance::find($attendanceId);

        if (!$attendance) return response()->json(['error' => 'attendance not found']);

        $attendance->delete();

        return response()->json(['message' => 'attendance deleted successfully!']);
    }
}
