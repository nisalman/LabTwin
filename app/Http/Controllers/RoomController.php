<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isFalse;

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

        $validatedData = $request->validate([
            'name' => 'required',
            'building_id' => 'required|numeric|min:0|not_in:0',
        ], [
            'name.required' => 'Name field is required.',
            'building_id.required' => 'Building is required',
        ]);
        $room = new Room;
        $room->name=$validatedData['name'];
        $room->building_id=$validatedData['building_id'];
        $room->save();
        toastr()->success('Data successfully Added', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect()->route('room.list');
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
        toastr()->success('Data successfully updated', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect()->route('room.list');
    }
    public function delete($id)
    {
         $place = Place::where('room_id', $id)->get();

         if ($place->isEmpty()) {
            Room::where('id', $id)->delete();
             toastr()->success('Room successfully deleted', 'Success', ['positionClass' => 'toast-bottom-right']);
             return redirect()->back();
        }else{
             toastr()->warning('This Room contains places, You need to delete corresponding places first!', 'Warning', ['positionClass' => 'toast-bottom-right']);
             return redirect()->back();
         }
    }
}
