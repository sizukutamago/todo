<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildTask extends Model
{
    protected $fillable = [];

    public function parent_task()
    {
    	return $this->belongsTo(Task::class, 'task_id');
    }

    public function author()
    {
    	return $this->belongsTo(User::class, 'author_id');
    }

    public function assign_user()
    {
    	return $this->belongsTo(User::class, 'assign_user_id');
    }
}
