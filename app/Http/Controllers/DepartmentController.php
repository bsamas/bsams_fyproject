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
        $name = new Department;

        // logic that check if the department exists but deleted then restore instead of dublicating
$check = Department::where('name', $name)->where('deleted_at', '!=', null)->withTrashed();

        if($check->exists()){
             $check->first()->restore();

            return redirect('/department')->with('message', 'department submitted');

        }
        // $validator=Validator::make($request->all(),
        // [

        //     'name'=>'required | unique:departments'

        // ]);
        // if($validator->fails()){
        //     return response()->json([
        //         'error'=>$validator->errors(),
        //         'message'=>$validator->errors()->first()
        //     ],404);
        // }
        else{
            if(Department::where('name', $name)->exists()){
                return redirect('/department')->with('error', 'department exists ');
            }
            else{

                $department = new Department;
                 $department->name=$request->input('name');


                 $department->save();

                 // return response()->json(['department' => $department],200);
                 return redirect('/department')->with('message', 'department added successfully ');
            }
        }
    }
     public function putDepartment(Request $request, $departmentId)
    {

          $validator=Validator::make($request->all(),
        [
            'name'=>'required'
        ]);


        if($validator->fails())
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);

        $department = Department::find($departmentId);

        if(!$department)  return response()->json(['error'=>'department not found']);

        $department->update([

            'name'=> $request->name,


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
        $department->name = $request->input('name');
        $department->save();

        return redirect('/department')->with('message', 'department updated successfully');
    }

    public function delete($id){
        Department::find($id)->delete();
        return redirect('/department')->with('message', 'department deleted successfully');
    }
}
