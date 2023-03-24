<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return inertia('UserAccount/Profile', [
            'profile' => Auth::user(),
            'title' => 'Profile | User Account | House',
            'description' => 'Online House Listing.'
        ]);
    }

    public function update(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'mimes:jpg,png,jpeg,webp|max:5000'
            ], [
                'avatar.mimes' => 'The file should be in one of the formats: jpg, png, jpeg, webp'
            ]);

            $path = $request->file('avatar')->store('avatars', 'public');
            $validatedData = $request->validate([
                'name' => 'required',
                'phone' => 'required'
            ]);

            if ($validatedData) {
                Auth::user()->update(array_merge($validatedData, ['avatar' => $path]));
            }
        } else {
            Auth::user()->update(
                $request->validate([
                    'name' => 'required',
                    'phone' => 'required',
                ])
            );
        }

        return redirect()->back()->with('success', 'Profile updated!');
    }
}
