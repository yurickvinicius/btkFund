<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Result;
use Faker\Generator as Faker;

$factory->define(Result::class, function (Faker $faker) {

    $operationType = ['s','b'];

    return [
        'operation_type' => $operationType[rand(0,1)],
        'operation_volume' => rand(1,20),
        'entry_price' => rand(1000, 9000),
        'exit_price' => rand(1000, 9000),
        'stop_loss' => rand(1000, 9000),
        'take_profit' => rand(1000, 9000),
        'result_profit' => rand(1000, 9000),
        'current_profit' => rand(1000, 9000),
        'data_hour_operation' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
        'robot_id' => rand(1,15)
    ];
});
