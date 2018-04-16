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

	/**
	 * 作成した親タスクの取得
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function tasks()
    {
    	return $this->hasMany(Task::class, 'author_id');
    }

	/**
	 * 作成した子タスクの取得
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function child_tasks()
    {
    	return $this->hasMany(ChildTask::class, 'author_id');
    }

	/**
	 * 全てのアサインタスクの取得
	 *
	 * @return mixed
	 */
    public function all_tasks()
    {
    	$tasks = $this->tasks();
    	return $tasks->merge($this->child_tasks());
    }

	/**
	 * アサインされている親タスクの取得
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function assign_tasks()
    {
    	return $this->hasMany(Task::class, 'assign_user_id');
    }

	/**
	 * アサインされている子タスクの取得
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function assign_child_tasks()
    {
    	return $this->hasMany(Task::class, 'assign_user_id');
    }
}
