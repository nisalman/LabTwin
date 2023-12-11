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
      return $request;
    }
}
