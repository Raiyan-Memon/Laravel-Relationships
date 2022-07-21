<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Student extends Model
{
   protected $table = 'students';

    public function books()
    {
        
        return $this->belongsToMany(Book::class, 'student_books');
    }



}
