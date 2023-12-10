<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Instrument;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Http\Request;
Use Carbon\Carbon;

class InstrumentController extends Controller
{
    public function index()
    {

    }

    public function instrumentCreate(Request $request){

        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            $image->move('uploads/instruments',$imagename);
        }else{
            $imagename = "default.png";
        }
        $instrument = new Instrument();

        $instrument->name = $request->name;
        $instrument->code = $request->code;
        $instrument->inventory_number = $request->in;
        $instrument->digital_resource = $request->dr;
        $instrument->calibration_date = Carbon::parse($request->default_date)->format('Y-m-d');
        $instrument->place_id = $request->place_id;
        $instrument->image = $imagename;

        $instrument->save();
        toastr()->success('Data has been saved successfully!', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect()->back();
    }

    public function create()
    {
//        toastr()->success('Data has been saved successfully!', 'Test', ['positionClass' => 'toast-bottom-right']);
//        toastr()->success('Data has been saved successfully!', 'Congrats');
        $buildings = Building::all();
        return view('add_instruments', compact('buildings'));
    }

    public function changePlace(Request $request)
    {
        Instrument::where('id', $request->bId)
            ->update([
                'place_id' => $request->place_id,
            ]);
        return redirect()->back();
    }

    public function getRoomsByBuildings($id)
    {
        $rooms = Room::where('building_id', $id)->pluck("name", "id");
        return json_encode($rooms);
    }

    public function getPlacesByRooms($id)
    {
        $places = Place::where('room_id', $id)->pluck("name", "id");
        return json_encode($places);
    }

    public function generateBarcode(Request $request){

        $barCode = Instrument::find(1);
        return view('mainpage')->with('barCode',$barCode);
    }
}
