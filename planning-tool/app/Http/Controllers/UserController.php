<?php

namespace App\Http\Controllers;

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
        return view('admin.users.editusers', ['user' => $user]);
    }

    public function postUpdateUser(Request $request) {
        $user = User::find($request->input('id'));

        $user->firstName = $request->input('firstname');
        $user->lastName = $request->input('lastname');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        $user->save();

        return redirect()->route('users');
    }

}
