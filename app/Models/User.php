<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks()
    {
    	return $this->hasMany(Task::class, 'author_id');
    }

    public function child_tasks()
    {
    	return $this->hasMany(ChildTask::class, 'author_id');
    }

    public function all_tasks()
    {
    	$tasks = $this->tasks();
    	return $tasks->merge($this->child_tasks());
    }

    public function assign_tasks()
    {
    	return $this->hasMany(Task::class, 'assign_user_id');
    }

    public function assign_child_tasks()
    {
    	return $this->hasMany(Task::class, 'assign_user_id');
    }
}
