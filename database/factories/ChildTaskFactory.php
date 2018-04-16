<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ChildTask::class, function (Faker $faker) {
	return [
		'title' => $faker->realText($faker->numberBetween(11, 20)),
		'content' => $faker->realText($faker->numberBetween(20, 30)),
		'start_date' => random_date('2018-4-1', '2018-4-30'),
		'end_date' => random_date('2018-5-1', '2018-5-30'),
		'task_id' => function() {
			return factory(App\Models\Task::class)->create()->id;
		},
		'author_id' => function() {
			return factory(App\Models\User::class)->create()->id;
		},
		'assign_user_id' => function() {
			return factory(App\Models\User::class)->create()->id;
		},
	];
});
