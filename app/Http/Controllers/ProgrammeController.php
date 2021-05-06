<?php

namespace App\Http\Controllers;

use App\Department;
use App\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgrammeController extends Controller
{
    public function getAllProgrammes()
    {
        $programmes = Programme::all();
        $departments = Department::all();
        // return response()->json(['programmes' => $programmes]);
        return view('programme.programme', compact('programmes', "departments"));
    }

    public function getSingleProgramme($programmeId)
    {
        $programme = Programme::find($programmeId);

        if (!$programme) return response()->json(['error' => 'Programme not found']);

        $programme->programmes;

        return response()->json(['programme' => $programme]);
    }





    public function postProgramme(Request $request)
    {

       $name = $request->input('name');

        // logic that check if the programme exists but deleted then restore instead of dublicating
     $check = Programme::where('name', $name)->where('deleted_at', '!=', null)->withTrashed();

        if($check->exists()){
             $check->first()->restore();

            return redirect('/programme')->with('message', 'programme submitted');

        }

        else{
            if(Programme::where('name', $name)->exists()){
                return redirect('/programme')->with('error', 'programme exists ');
            }
            else{

               
                $programme=new programme;
                 $programme->name=$request->input('name');
                 $programme->department_id=$request->input('department_id');

                 $programme->save();


                 return redirect('/programme')->with('message', 'programme added successfully ');
            }
        }
    }
    //     $validator=Validator::make($request->all(),
    //     [

    //         'name'=>'required'

    //     ]);
    //     if($validator->fails()){
    //         return response()->json([
    //             'error'=>$validator->errors(),
    //             'message'=>$validator->errors()->first()
    //         ],404);
    //     }
    //     $programme=new Programme();
    //     $programme->name=$request->input('name');


    //     $programme->save();
    //     // return response()->json(['programme' => $programme],200);
    //    return redirect('/programme')->with('message', 'Programme registered successfully');
    // }

     public function putProgramme(Request $request, $programmeId)
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

        $programme = Programme::find($programmeId);

        if(!$programme)  return response()->json(['error'=>'programme not found']);

        $programme->update([

            'name'=> $request->name,


        ]);


        // $programme->update($request->all());
    }

    public function deleteProgramme($programmeId)
    {

        $programme = Programme::find($programmeId);

        if (!$programme) return response()->json(['error' => 'programme not found']);

        $programme->delete();

        return response()->json(['message' => 'programme deleted successfully!']);
    }

    public function edit($id, Request $request){
         $programme = Programme::where('id', $id)->first();
        $programme->name = $request->input('name');
         $programme->department_id=$request->input('department_id');

        $programme->save();

        return redirect('/programme')->with('message', 'programme updated successfully');
    }

    public function delete($id){
        $programme = Programme::find($id)->delete();

        if (!$programme) return redirect('/programme')->with(['error' => 'programme not found']);

        $programme->delete();
        return redirect('/programme')->with('message', 'programme deleted successfully');
    }

}
