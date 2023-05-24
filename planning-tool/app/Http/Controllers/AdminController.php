<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{


    public function dashboard() {

        $user = Auth::user();
        $firstName = $user->firstName;

        if ($user->isAdmin()) {
            $firstName = "This user is an admin";
        }

        return view('admin.dashboard', ['firstName' => $firstName]);

    }

    public function getTeachers() {
        $teachers = Professor::orderBy('id', 'asc')->get();

        return view('admin.teachers', ['teachers' => $teachers]);
    }

    public function getEditTeachers($id) {

        $teacher = Professor::find($id);
        return view('admin.editteacher', ['teacher' => $teacher]);

    }
    public function postUpdateTeacher(Request $request) {

        $teacher = Professor::find($request->input('id'));

        $teacher->firstName = $request->input('firstname');
        $teacher->lastName = $request->input('lastname');
        $teacher->email = $request->input('email');

        $teacher->save();

        return redirect()->route('teachers');

    }

    public function getCreateTeacher() {
        return view('admin.createteacher');
    }

    public function postCreateTeacher(Request $request) {

        $teacher = new Professor([
            'firstName' => $request->input('firstname'),
            'lastName' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        $teacher->save();

        return redirect()->route('teachers');

    }

    public function getDeleteTeacher($id) {
        $teacher = Professor::find($id);
        $teacher->delete();

        return redirect()->action([AdminController::class, "getTeachers"]);
    }
}
