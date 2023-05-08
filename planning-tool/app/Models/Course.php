<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'professor_id',
        'description',
        'semester',
        'nrSessions',
        'sessionLength'
    ];

    public function students() {
        return $this->belongsToMany(User::class);
    }

    public function teacher() {
        return $this->hasOne(Professor::class);
    }

    public function planning() {
        return $this->belongsTo(Planning::class);
    }






}
