<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Planning;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $sessions = Planning::orderBy('date', 'asc')->get();
        foreach ($sessions as $session) {
            $session = Planning::where('id', $session['course_id'])->first();
        }
        //$coursedetails = Course::where('id', $session['course_id'])->first();


        $getAllCourses = Course::orderBy('id', 'desc')->get();
        foreach ($getAllCourses as $getCourse) {
            $getCourse = Course::where('professor_id', $getCourse['professor_id'])->first();
        }
        $teachers = Professor::where('id', $getCourse['professor_id'])->first();

        return view('content.planning', ['sessions' => $sessions, 'teachers' => $teachers, 'firstName' => $firstName]);
    }

    public function getPlannedCourse($id){

        $user = Auth::user();
        $firstName = $user->firstName;

        $plannedcourse = Planning::where('id', $id)->first();
        $coursedetails = Course::where('id', $plannedcourse->course_id)->first();
        $courseteacher = Professor::where('id', $coursedetails->professor_id)->first();
        return view('content.planned-course', ['plannedcourse' => $plannedcourse, 'coursedetails' => $coursedetails, 'courseteacher' => $courseteacher, 'firstName' => $firstName]);
    }

    public function getPlanCourse($id) {
        $course = Course::find($id);
        return view('admin.planning.plancourse', ['course' => $course]);
    }

    public function postPlanCourse(Request $request) {

        $course = Course::find($request->input('course_id'));

        $nrOfSessions = $course->nrSessions;

        for ($i = 0; $i < $nrOfSessions; $i++) {

            $date = Carbon::parse($request->input('date'));
            $newDate = $date->addDays(7 * $i);

            $planCourse = new Planning([
                'course_id' => $request->input('course_id'),
                'date' => $newDate,
                'sessionOfCourse' => $i + 1,
                'location' => $request->input('location'),
                'startTime' => $request->input('startTime'),
                'endTime' => $request->input('endTime'),
            ]);

            $planCourse->save();
        }

        return redirect()->route('courses');

    }





}
