<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RobotUser;
use Faker\Generator as Faker;

$factory->define(RobotUser::class, function (Faker $faker) {

    return [
        'user_id' => rand(1,15),
        'robot_id' => rand(1,15)
    ];
});
