<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return inertia('User/Register', [
            'title' => 'Register | House',
            'description' => 'Online House Listing.'
        ]);
    }

    public function store(Request $request)
    {
        $user = User::make($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:8|confirmed',
            'accept' => 'accepted'
        ]));

        $user->save();

        return redirect('/register')->with('success', 'Account successfully created.');
    }
}
