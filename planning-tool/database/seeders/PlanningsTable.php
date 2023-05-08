<?php

namespace Database\Seeders;

use App\Models\Planning;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanningsTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {$plan = new Planning([
        'course_id' => 1,
        'date' => date("y-m-d"),
        'sessionOfCourse' => 1,
        'location' => 'B101'
    ]);
        $plan->save();

        $plan = new Planning([
            'course_id' => 2,
            'date' => date("y-m-d"),
            'sessionOfCourse' => 1,
            'location' => 'B103'
        ]);
        $plan->save();

        $plan = new Planning([
            'course_id' => 3,
            'date' => date("y-m-d"),
            'sessionOfCourse' => 1,
            'location' => 'B048'
        ]);
        $plan->save();
    }
}
