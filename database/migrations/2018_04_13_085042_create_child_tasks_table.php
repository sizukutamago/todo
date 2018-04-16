<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_tasks', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('title');
	        $table->text('content');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('task_id'); //親タスク
            $table->unsignedInteger('assign_user_id'); //アサインユーザ
            $table->unsignedInteger('author_id'); //作成者
            $table->timestamps();

	        $table->foreign('task_id')->references('id')->on('tasks');
	        $table->foreign('assign_user_id')->references('id')->on('users');
	        $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_tasks');
    }
}
