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


}
