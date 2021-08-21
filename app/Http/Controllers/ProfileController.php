<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::findOrFail(auth()->user()->id);
        return view('profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = User::findOrFail(auth()->user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $profile->id
        ]);
        $profile->update($request->all());
        return back()->with('success', 'Profile has been updated!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:5|confirmed'
        ]);
        $profile = User::findOrFail(auth()->user()->id);
        $profile->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('success', 'Password has been updated!');
    }
}
