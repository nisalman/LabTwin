<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('searchDemo');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = User::select("name")
            ->where('name', 'LIKE', '%' . $request->get('query') . '%')
            ->get();

        return response()->json($data);
    }



}
