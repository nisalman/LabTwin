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
        $place = new Place;
        $place->name=$request->name;
        $place->room_id=$request->room_id;
        $place->save();
        return redirect()->back();
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
        return redirect('place');

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
