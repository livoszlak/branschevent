<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Authentication passed...
            return redirect()->route('profile.show', ['id'=> $user->id])->with('status', 'Registration successful! Please log in.');
        }

        return redirect()->route('login')->withErrors(['email' => 'These credentials do not match our records.']);
    }
}
