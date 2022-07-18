<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class Book extends Model
{
    public function students()
    {
       return $this->belongsToMany(Student::class, 'student_books');
    }
}
