<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Place;
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
    public function Update(Request $request, $id)
    {
        Building::where('id',$id)->update(['name'=>$request->name]);;
        toastr()->success('Data successfully updated', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect('/building');

    }
    public function delete($id)
    {
        $room = Room::where('building_id', $id)->get();

        if ($room->isEmpty()) {
            Building::where('id', $id)->delete();
            toastr()->success('Building successfully deleted', 'Success', ['positionClass' => 'toast-bottom-right']);
            return redirect()->back();
        }else{
            toastr()->warning('This Building contains Rooms, You need to delete corresponding places first!', 'Warning', ['positionClass' => 'toast-bottom-right']);
            return redirect()->back();
        }
    }

}
