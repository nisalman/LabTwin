<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\File;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('Users.index', compact('users'));
    }

    public function create()
    {
        return view('Users.add');
    }

    public function view($id)
    {
        $user = User::find($id);
        return view('Users.viewProfile', compact('user'));
    }

    public function store(Request $request)
    {
        //return $request;
        //return $request;

        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required',
            'position' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'role' => 'required',
            'about' => 'required',
            'password' => 'required',
            'image' => 'required',

        ], [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.',
            'age.required' => 'Age is required.',
            'position.required' => 'Position is required.',
            'address.required' => 'Address is required.',
            'phone.required' => 'Phone is required.',
            'email.required' => 'Email is required.',
            'role.required' => 'Role is required.',
            'about.required' => 'About is required.',
            'password.required' => 'Password is required.',
            'image.required' => 'Image is required.',

        ]);

        $image = $request->file('image');
        $slug = str_slug($validatedData['fname']);

        if (isset($image)) {
            //return $request->image;
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/profile', $imagename);
        } else {
            $imagename = "default.png";
        }

        $user = new User;
        $user->name = $validatedData['fname'];
        $user->lname = $validatedData['lname'];
        $user->age = $validatedData['age'];
        $user->position = $validatedData['position'];
        $user->address = $validatedData['address'];
        $user->phone = $validatedData['phone'];
        $user->email = $validatedData['email'];
        $user->type = $validatedData['role'];
        $user->about = $validatedData['about'];
        $user->password = Hash::make($validatedData['password']);
        $user->image = $imagename;
        $user->save();
        toastr()->success('Data successfully Added', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect()->route('user.list');
    }

    public function edit($id)
    {
        //return User::find($id)->image;
        $user = User::find($id);
        return view('Users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        //return $request;
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required',
            'position' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'role' => 'required',
            'about' => 'required',

        ], [
            'fname.required' => 'First name field is required.',
            'lname.required' => 'Last name field is required.',
            'age.required' => 'Age is required.',
            'position.required' => 'Position field is required.',
            'address.required' => 'Address field is required.',
            'phone.required' => 'Phone field is required.',
            'email.required' => 'Email field is required.',
            'role.required' => 'Role field is required.',
            'about.required' => 'About field is required.',

        ]);

        $image = $request->file('file');
        if ($image != NULL) {
            $slug = $request->fname;
            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/profile', $imagename);
                unlink('uploads/profile/'.User::find($id)->image);
            } else {
                $imagename = "default.png";
            }
            User::where('id', $id)->update([
                'image' => $imagename,
            ]);

        }


        User::where('id', $id)->update([
            'name' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'age' => $validatedData['age'],
            'position' => $validatedData['position'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'type' => $validatedData['role'],
            'about' => $validatedData['about'],
        ]);
        toastr()->success('Data successfully Updated', 'Success', ['positionClass' => 'toast-bottom-right']);

        if ($request->password != NULL) {
            User::where('id', $id)->update([
                'password' => Hash::make($request->password)
            ]);
            toastr()->success('Password successfully Updated', 'Success', ['positionClass' => 'toast-bottom-right']);
        }

        return redirect()->route('user.list');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        unlink('uploads/profile/' . $user->image);
        $user->delete();
        toastr()->success('Data successfully Deleted', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect()->route('user.list');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastr()->success('logged out', 'Success', ['positionClass' => 'toast-bottom-right']);
        return redirect('/');

    }
}
