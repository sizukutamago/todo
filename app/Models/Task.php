<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [];

	/**
	 * 作成者の取得
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function author()
    {
    	return $this->belongsTo(User::class, 'author_id');
    }

	/**
	 * アサインユーザの取得
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function assign_user()
	{
		return $this->belongsTo(User::class, 'assign_user_id');
	}

	/**
	 * 子タスクの取得
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function child_tasks()
	{
		return $this->hasMany(ChildTask::class, 'task_id');
	}
}
