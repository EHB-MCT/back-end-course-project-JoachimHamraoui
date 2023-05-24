<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Professor;

class TeacherController extends Controller
{
    // GET TEAHCERS

    public function getTeachers() {
        $teachers = Professor::orderBy('id', 'asc')->get();

        return view('admin.teachers.teachers', ['teachers' => $teachers]);
    }

    // GET VIEW EDIT TEACHER

    public function getEditTeachers($id) {

        $teacher = Professor::find($id);
        return view('admin.teachers.editteacher', ['teacher' => $teacher]);

    }

    // POST EDIT TEACHERS
    public function postUpdateTeacher(Request $request) {

        $teacher = Professor::find($request->input('id'));

        $teacher->firstName = $request->input('firstname');
        $teacher->lastName = $request->input('lastname');
        $teacher->email = $request->input('email');

        $teacher->save();

        return redirect()->route('teachers');

    }



    public function getCreateTeacher() {
        return view('admin.teachers.createteacher');
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

        return redirect()->action([TeacherController::class, "getTeachers"]);
    }
}
