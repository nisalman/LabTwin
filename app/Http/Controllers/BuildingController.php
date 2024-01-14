<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Room;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings=Building::all();
        return view('buildings.index', compact('buildings'));
    }
    public function create()
    {
        return view('buildings.add');
    }

    public function store(Request $request)
    {
        //return $request;
        $building = new Building;
        $building->name=$request->name;
        $building->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $buildings=Building::find($id);
        return view('buildings.edit', compact('buildings'));
    }
}
