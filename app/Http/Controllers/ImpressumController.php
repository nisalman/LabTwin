<?php

namespace App\Http\Controllers;

use App\Models\Impressum;
use Illuminate\Http\Request;

class ImpressumController extends Controller
{
    private function getImpressumData() {
        return Impressum::find(1)->page_data;
    }

    public function index()
    {
        $impData = $this->getImpressumData();
        return view('Setting.Impressum.index', compact('impData'));
    }

    public function edit(Request $request, $id = 1)
    {
        $impData = $this->getImpressumData();
        return view('Setting.Impressum.edit', compact('impData'));

    }

    public function update(Request $request)
    {
        Impressum::where('id', 1)->update(['page_data' => $request->description]);
        toastr()->success('Impressum data successfully updated', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect('/setting/impressum');
    }


    public function view()
    {
        $impData = $this->getImpressumData();
        return view('impressum', compact('impData'));
    }
}
