<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Instrument;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places=Place::all();

        return view('places.index', compact('places'));
    }

    public function create()
    {
        $places=Place::all();
        $rooms=Room::all();
        $buildings=Building::all();
        return view('places.add', compact('places', 'rooms', 'buildings'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'building_id' => 'required|numeric|min:0|not_in:0',
            'room_id' => 'required|numeric|min:0|not_in:0',
        ], [
            'name.required' => 'Name field is required.',
            'building_id.required' => 'Building is required',
            'room_id.required' => 'Room is required',
        ]);

        $place = new Place;
        $place->name=$validatedData['name'];
        $place->room_id=$validatedData['room_id'];
        $place->save();
        toastr()->success('Data has been saved successfully!', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect()->route('place.list');
    }
    public function edit($id)
    {
        $place=Place::find($id);
        $buildings=Building::all();
        $rooms=Room::all();
        return view('places.edit', compact('place','rooms', 'buildings'));
    }
    public function Update(Request $request, $id)
    {
        Place::where('id',$id)->update([
            'name'=>$request->name,
            'room_id'=>$request->room_id,
        ]);
        toastr()->success('Data successfully updated', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect()->route('place.list');

    }
    public function delete($id)
    {
        $place = Instrument::where('place_id', $id)->get();

        if ($place->isEmpty()) {
            Room::where('id', $id)->delete();
            toastr()->success('Room successfully deleted', 'Success', ['positionClass' => 'toast-bottom-right']);
            return redirect()->back();
        }else{
            toastr()->warning('This Place contains instruments, You need to delete corresponding instrument first!', 'Warning', ['positionClass' => 'toast-bottom-right']);
            return redirect()->back();
        }

    }
}
