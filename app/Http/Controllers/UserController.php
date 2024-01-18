<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastr()->success('logged out', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect('/');

    }
}
