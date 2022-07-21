<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Task;

class Project extends Model
{
    public function users()
    {
        return $this->hasMany(User::class, 'project_id');
    }
    public function tasks()
    {
        return $this->hasOneThrough(Task::class, User::class);
    }
}
