<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [];

    public function author()
    {
    	return $this->belongsTo(User::class, 'author_id');
    }

	public function assign_user()
	{
		return $this->belongsTo(User::class, 'assign_user_id');
	}
}
