<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function edit()
    {
        return inertia('UserAccount/Setting', [
            'title' => 'Settings | User Account | House',
            'description' => 'Online House Listing.'
        ]);
    }

    public function update(Request $request)
    {
        Auth::user()->update(
            $request->validate([
                'current_password' => 'required|current_password',
                'password' => 'required|min:8|confirmed'
            ])
        );

        return redirect()->back()->with('success', 'Password updated!');
    }
}
