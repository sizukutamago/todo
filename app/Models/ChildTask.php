<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildTask extends Model
{
    protected $fillable = [];

	/**
	 * 親タスクの取得
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function parent_task()
    {
    	return $this->belongsTo(Task::class, 'task_id');
    }

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
}
