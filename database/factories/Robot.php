<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Robot;
use Faker\Generator as Faker;

$factory->define(Robot::class, function (Faker $faker) {

    $paper = ['wdoh21', 'indg21', 'petro4', 'itub3'];

    return [
        'magic_number'=> rand(1000,9000),
        'paper'=> $paper[rand(0,3)]
    ];
});
