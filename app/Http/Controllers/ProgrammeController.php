<?php

namespace App\Http\Controllers;

use App\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgrammeController extends Controller
{
    public function getAllProgrammes()
    {
        $programmes = Programme::all();
        // return response()->json(['programmes' => $programmes]);
        return view('programme.viewprogramme', compact('programmes'));
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
        $validator=Validator::make($request->all(),
        [

            'programme_name'=>'required'

        ]);
        if($validator->fails()){
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);
        }
        $programme=new Programme();
        $programme->programme_name=$request->input('programme_name');


        $programme->save();
        // return response()->json(['programme' => $programme],200);
       return redirect('/programme')->with('message', 'Programme registered successfully');
    }

     public function putProgramme(Request $request, $programmeId)
    {

          $validator=Validator::make($request->all(),
        [
            'programme_name'=>'required'
        ]);


        if($validator->fails())
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);

        $programme = Programme::find($programmeId);

        if(!$programme)  return response()->json(['error'=>'programme not found']);

        $programme->update([

            'programme_name'=> $request->programme_name,


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
}
