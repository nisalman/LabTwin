<?php

namespace App\Http\Controllers;

use App\Models\Building;
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
}
