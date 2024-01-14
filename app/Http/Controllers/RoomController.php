<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms=Room::all();

        return view('rooms.index', compact('rooms'));
    }
    public function create()
    {
        $rooms=Room::all();
        $buildings=Building::all();
        return view('rooms.add', compact('rooms', 'buildings'));
    }

    public function store(Request $request)
    {

        //return $request;
        $room = new Room;
        $room->name=$request->name;
        $room->building_id=$request->building_id;
        $room->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $room=Room::find($id);
         $buildings=Building::all();
        return view('Rooms.edit', compact('room', 'buildings'));
    }

    public function Update(Request $request, $id)
    {
        Room::where('id',$id)->update([
            'name'=>$request->name,
            'building_id'=>$request->building_id,
        ]);
        return redirect('room');

    }
}
