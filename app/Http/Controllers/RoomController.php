<?php

namespace App\Http\Controllers;

use App\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class roomController extends Controller
{
    public function getAllrooms()
    {
        $rooms = room::all();
        return response()->json(['rooms' => $rooms]);
    }

    public function getSingleroom($roomId)
    {
        $room = room::find($roomId);

        if (!$room) return response()->json(['error' => 'room not found']);

        $room->courses;

        return response()->json(['room' => $room]);
    }

    public function postroom(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'room_number'=>'required',
            'room_type'=>'required',
            'longitude'=>'required',
            'latitude'=>'required',
            'capacity'=>'required',



        ]);
        if($validator->fails()){
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);
        }
        $room=new room();
        $room->room_number=$request->input('room_number');
        $room->room_type=$request->input('room_type');
        $room->longitude=$request->input('longitude');
        $room->latitude=$request->input('latitude');
        $room->capacity=$request->input('capacity');



        $room->save();
        return response()->json(['room' => $room],200);
    }



    public function putroom(Request $request, $roomId)
    {

          $validator=Validator::make($request->all(),
        [
            'room_number'=>'required ',
            'room_type'=>'required',
            'capacity'=>'required',
            'longitude'=>'required',
            'latitude'=>'required'

        ]);


        if($validator->fails())
            return response()->json([
                'error'=>$validator->errors(),
                'message'=>$validator->errors()->first()
            ],404);

        $room = room::find($roomId);

        if(!$room)  return response()->json(['error'=>'room not found']);

        $room->update([
            'room_number'=> $request->room_number,
            'room_type'=> $request->room_type,
            'capacity'=> $request->capacity,
            'longitude'=> $request->longitude,
            'latitude-name'=> $request->latitude,

        ]);


        // $room->update($request->all());
    }

    public function deleteroom($roomId)
    {

        $room = room::find($roomId);

        if (!$room) return response()->json(['error' => 'room not found']);

        $room->delete();

        return response()->json(['message' => 'room deleted successfully!']);
    }
}
