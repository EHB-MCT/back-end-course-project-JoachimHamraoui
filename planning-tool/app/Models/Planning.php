<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'date',
        'sessionOfCourse',
        'location'
    ];


    public function lesson() {
        return $this->hasMany(Course::class);
    }

}
