<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register() {
        return view('other.register');
    }

    public function store(Request $request) {

        $this->validate($request, [
           'firstName' => 'required',
           'lastName' => 'required',
           'email' => 'required',
           'password' => 'required|min:8',
        ]);

        $user = new User([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'admin'
        ]);

        $user->save();

        return redirect()->route('login');

    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
