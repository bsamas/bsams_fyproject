<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function getAllDepartments()
    {
        $departments = Department::all();
        // return response()->json(['departments' => $departments]);
        return view('department.registereddepartment', compact('departments'));
    }

    public function getSingleDepartment($departmentId)
    {
        $department = Department::find($departmentId);

        if (!$department) return response()->json(['error' => 'Department not found']);

        $department->departments;

        return response()->json(['department' => $department]);
    }

    
    public function postDepartment(Request $request)
    {
        $department_name = $request->input('department_name');

        // logic that check if the department exists but deleted then restore instead of dublicating
$check = Department::where('department_name', $department_name)->where('deleted_at', '!=', null)->withTrashed();

        if($check->exists()){
             $check->first()->restore();

            return redirect('/registereddepartment')->with('message', 'department submitted');

        }
        // $validator=Validator::make($request->all(),
        // [

        //     'department_name'=>'required | unique:departments'

        // ]);
        // if($validator->fails()){
        //     return response()->json([
        //         'error'=>$validator->errors(),
        //         'message'=>$validator->errors()->first()
        //     ],404);
        // }
        else{
            if(Department::where('department_name', $department_name)->exists()){
                return redirect('/registereddepartment')->with('error', 'department exists ');
            }
            else{

                $department=new Department;
                 $department->department_name=$request->input('department_name');


                 $department->save();

                 // return response()->json(['department' => $department],200);
                 return redirect('/registereddepartment')->with('message', 'department added successfully ');
            }
        }
    }
     public function putDepartment(Request $request, $departmentId)
    {

          $validator=Validator::make($request->all(),
        [
            'department_name'=>'required'
        ]);


        if($validator->fails())
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);

        $department = Department::find($departmentId);

        if(!$department)  return response()->json(['error'=>'department not found']);

        $department->update([

            'department_name'=> $request->department_name,


        ]);


        // $department->update($request->all());
    }

    public function deleteDepartment($departmentId)
    {

        $department = Department::find($departmentId);

        if (!$department) return response()->json(['error' => 'department not found']);

        $department->delete();

        return response()->json(['message' => 'department deleted successfully!']);
    }

    public function edit($id, Request $request){

        $department = Department::where('id', $id)->first();
        $department->department_name = $request->input('department_name');
        $department->save();

        return redirect('/registereddepartment')->with('message', 'department updated successfully');
    }

    public function delete($id){
        Department::find($id)->delete();
        return redirect('/registereddepartment')->with('message', 'department deleted successfully');
    }
}
