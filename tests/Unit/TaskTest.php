<?php
/**
 * Created by PhpStorm.
 * User: tanakas
 * Date: 2018/04/16
 * Time: 13:24
 */

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @var Task
	 */
	protected $task;

	public function setUp()
	{
		parent::setUp();

		$this->task = factory(Task::class)->create();
	}

	/** @test */
	public function 作成者が一人いる()
	{
		$this->assertInstanceOf(User::class, $this->task->author);
	}
}
