<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Planning;
use App\Models\Professor;
use Illuminate\Http\Request;

class PlanningController extends Controller
{

    public function getIndex() {

        $plannings = Planning::orderBy('created_at', 'desc')->get();
        $courses = Course::orderBy('created_at', 'desc')->get();
        $teachers = Professor::orderBy('created_at', 'desc')->get();

        return view('content.index', ['plannings' => $plannings, 'courses' => $courses, 'teachers' => $teachers]);
    }

}
