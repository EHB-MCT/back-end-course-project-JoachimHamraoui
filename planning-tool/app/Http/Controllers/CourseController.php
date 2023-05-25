<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Planning;
use App\Models\Professor;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function getCourses() {
        $courses = Course::orderBy('name', 'asc')->get();

        return view('admin.courses.courses', ['courses' => $courses]);
    }

    public function getCreateCourse() {
        $teachers = Professor::orderBy('firstName', 'asc')->get();
        return view('admin.courses.createcourse', ['teachers' => $teachers]);
    }

    public function postCreateCourse(Request $request) {

        $course = new Course([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'professor_id' => $request->input('teacher'),
            'semester' => $request->input('semester'),
            'nrSessions' => $request->input('nrSessions'),
            'sessionLength' => $request->input('sessionLength'),
        ]);

        $course->save();

        return redirect()->route('courses');
    }

    public function getEditCourse($id) {
        $course = Course::find($id);
        $teachers = Professor::orderBy('firstName', 'asc')->get();
        $teacher = Professor::where('id', $course->professor_id)->first();
        return view('admin.courses.editcourse', ['course' => $course, 'teacher' => $teacher, 'teachers' => $teachers]);
    }

    public function postUpdateCourse(Request $request) {

        $course = Course::find($request->input('id'));

        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->professor_id = $request->input('teacher');

        $course->save();

        return redirect()->route('courses');

    }

    public function getDeleteCourse($id) {
        $course = Course::find($id);
        $plannedcourses = Planning::where('course_id', $id)->get();

        foreach ($plannedcourses as $plannedcourse) {
            $plannedcourse->delete();
        }

        $course->delete();
        //$plannedcourses->delete();

        return redirect()->action([CourseController::class, "getCourses"]);
    }

}
