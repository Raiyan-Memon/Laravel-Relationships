<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    protected $primaryKey = 'post_id';

    public function comments()
    {
       
        return $this->hasMany(Comment::class, 'post_id');
    }
}
