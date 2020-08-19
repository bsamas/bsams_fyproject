<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\request as REQ;

class userController extends Controller
{
    public function getAllusers()
    {
        $users = User::all();
        $departments = Department::all();
        if (REQ::is('api/*')) {
           return response()->json(['users' => $users]);
        }

        return view('user.user', compact('users','departments'));
    }

    public function getSingleuser($userId)
    {
        $user = User::find($userId);

        if (!$user) return response()->json(['error' => 'user not found']);

        $user->courses;
        $user->departments;

        return response()->json(['user' => $user]);
    }



    public function postUser(Request $request)
    {
        $validator=Validator::make($request->all(),
        [

        // 'user_number'=>'required',
        'name'=>'required',
        'gender'=>'required',
        'type'=>'required',
        'email'=>'required',
        'password',
        'department_id'



        ]);
        if($validator->fails()){
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);
        }
        $user=new User();
        // $user->user_number=$request->input('user_number');
        $user->name=$request->input('name');
        $user->gender=$request->input('gender');
        $user->type=$request->input('type');
        $user->email=$request->input('email');
        //  how to print foreign key details
        $user->department_id=$request->input('department_id');
        $user->password=$request->input('password');



        $user->save();
        if (REQ::is('api/*')) {
            return response()->json(['user' => $user],200);
        }
       return redirect('/user')->with('message', 'registration done successfully');
    }



    public function putuser(Request $request, $userId)
    {

          $validator=Validator::make($request->all(),
        [
            // 'user_number'=>'required',
            'name'=>'required',
            'gender'=>'required',
            'type'=>'required',
            'email'=>'required',
            'department_id'=>'required',
            'password'


        ]);


        if($validator->fails())
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);

        $user = User::find($userId);

        if(!$user)  return response()->json(['error'=>'user not found']);

        $user->update([
            // 'user_number'=> $request->user_number,
            'name'=> $request->name,
            'gender'=> $request->gender,
            'email'=> $request->email,
            'type'=> $request->type,
            'password'=> $request->password,
            'department_id'=> $request->department_id,

        ]);


        // $user->update($request->all());
    }

    public function deleteuser($userId)
    {

        $user = user::find($userId);
        if (REQ::is('api/*')) {
            if (!$user) return response()->json(['error' => 'user not found']);
        }
        if (!$user) return redirect('/register')->with(['error' => 'user not found']);

        $user->delete();
        if (REQ::is('api/*')) {
             return response()->json(['message' => 'user deleted successfully!']);
        }
        return redirect('/user')->with(['message' => 'user deleted successfully!']);
    }
}
