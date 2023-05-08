<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = new Course([
            'name' => 'Development IV',
            'professor_id' => 1,
            'description' => 'Development IV is a programming course. In this obligatory course, you will learn the basics of Kotlin.',
            'semester' => 4,
            'nrSessions' => 9,
            'sessionLength' => 4
        ]);
        $course->save();

        $course = new Course([
            'name' => 'Generative Motion',
            'professor_id' => 2,
            'description' => 'TouchDesigner en zo',
            'semester' => 4,
            'nrSessions' => 8,
            'sessionLength' => 4
        ]);
        $course->save();

        $course = new Course([
            'name' => 'Back-End',
            'professor_id' => 3,
            'description' => 'Het vak waarvoor ik nu werk',
            'semester' => 4,
            'nrSessions' => 8,
            'sessionLength' => 4
        ]);
        $course->save();
    }
}
