<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function getUsers() {
        $users = User::orderBy('firstName', 'asc')->get();
        return view('admin.users.users', ['users' => $users]);
    }

    public function getEditUser($id) {
        $user = User::find($id);
        $courses = Course::orderBy('name', 'asc')->get();
        return view('admin.users.editusers', ['user' => $user, 'courses' => $courses]);
    }

    public function getEditUserCourses($id) {
        $user = User::find($id);
        $courses = Course::orderBy('name', 'asc')->get();
        return view('content.edituser', ['user' => $user, 'courses' => $courses]);
    }

    public function postUpdateUser(Request $request) {
        $user = User::find($request->input('id'));

        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $user->firstName = $request->input('firstname');
        $user->lastName = $request->input('lastname');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        $user->save();

        return redirect()->route('users');
    }

    public function postUpdateUserCourse(Request $request) {
        $user = User::find($request->input('id'));

        $this->validate($request, [
            'course1' => 'required',
            'course2' => 'required',
            'course3' => 'required',
        ]);

        $user->chosenCourse1 = $request->input('course1');
        $user->chosenCourse2 = $request->input('course2');
        $user->chosenCourse3 = $request->input('course3');

        $user->save();

        return redirect()->route('planning');
    }

}
