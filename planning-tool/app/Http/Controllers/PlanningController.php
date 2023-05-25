<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Planning;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanningController extends Controller
{

    public function getIndex() {

        $user = Auth::user();
        $firstName = $user->firstName;

        if ($user->isAdmin()) {
            $firstName = "This user is an admin";
        }

        //$firstName = $user->firstName;

        // get all info on sessions with Course name
        $sessions = Planning::orderBy('date', 'desc')->get();
        foreach ($sessions as $session) {
            $session = Planning::where('id', $session['course_id'])->first();
        }
        $coursedetails = Course::where('id', $session['course_id'])->first();


        $getAllCourses = Course::orderBy('id', 'desc')->get();
        foreach ($getAllCourses as $getCourse) {
            $getCourse = Course::where('professor_id', $getCourse['professor_id'])->first();
        }
        $teachers = Professor::where('id', $getCourse['professor_id'])->first();

        return view('content.planning', ['sessions' => $sessions, 'teachers' => $teachers, 'coursedetails' => $coursedetails, 'firstName' => $firstName]);
    }

    public function getPlannedCourse($id){

        $user = Auth::user();
        $firstName = $user->firstName;

        $plannedcourse = Planning::where('id', $id)->first();
        $coursedetails = Course::where('id', $plannedcourse['course_id'])->first();
        $courseteacher = Professor::where('id', $coursedetails['professor_id'])->first();
        return view('content.planned-course', ['plannedcourse' => $plannedcourse, 'coursedetails' => $coursedetails, 'courseteacher' => $courseteacher, 'firstName' => $firstName]);
    }

    public function getPlanCourse($id) {
        $course = Course::find($id);
        return view('admin.planning.plancourse', ['course', $course]);
    }





}
