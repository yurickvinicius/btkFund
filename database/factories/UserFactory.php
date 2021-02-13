<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'cpf' =>  rand(100, 900).'.'.rand(100, 900).'.'.rand(100, 900).'-'.rand(10,90),        
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'email_verified_at' => now(),
        'account_number'=> $faker->unique()->numberBetween(100000,900000),
        'in_use'=> $faker->numberBetween(0,1),
        'remember_token' => Str::random(10),
        'type_id' => 2
    ];
});
