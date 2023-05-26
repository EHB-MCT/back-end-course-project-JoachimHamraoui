<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register() {

        $courses = Course::orderBy('name', 'asc')->get();

        return view('other.register', ['courses' => $courses]);
    }

    public function store(Request $request) {

        $this->validate($request, [
           'firstName' => 'required',
           'lastName' => 'required',
           'email' => 'required|unique:users,email',
           'password' => 'required|min:8',
            'course1' => 'required',
            'course2' => 'required',
            'course3' => 'required',
        ]);

        $user = new User([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'student',
            'chosenCourse1' => $request->input('course1'),
            'chosenCourse2' => $request->input('course2'),
            'chosenCourse3' => $request->input('course3'),
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
