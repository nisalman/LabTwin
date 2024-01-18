<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Instrument;
use App\Models\Place;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function keysight()
    {
        return view('keysight');
    }

    public function main($id)
    {
        $instrument= Instrument::find($id);

        $placeID= Instrument::find($id)->place_id;
        $building= Place::find($placeID)->room->building->name;
        $room= Place::find($placeID)->room->name;
        $place=Place::find($placeID)->name;
        $IId= $id;

        $location = array($building, $room, $place);

        $users = User::all()->take(3);
        $userCount = $users->count();
        $buildings=Building::all();


        return view('mainpage', compact('instrument','users', 'userCount', 'buildings', 'location', 'IId'));
    }

    public function generateBarCode(Request $request)
    {

       $instrument= Instrument::find($request->iid);
       $instrumentCode = $instrument->code;
       $numberOfCodes = $request->barcodeNumber;

       return view('print-code',compact('instrumentCode','numberOfCodes'));

    }
}
