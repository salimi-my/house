<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login', [
            'title' => 'Sign in | House',
            'description' => 'Online House Listing.'
        ]);
    }

    public function store(Request $request)
    {
        if (!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]), $request->remember)) {
            throw ValidationException::withMessages([
                'auth' => 'Your email or password were incorrect.'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('user-account/profile');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
