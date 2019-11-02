<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//         'remember_token' => Str::random(10),
//     ];
// });

// $factory->define(App\Aircraft::class, function (Faker $faker) {
//     return [
//         'name' => $faker->company,
// 	    'variant' => $faker->company,
// 	    'status' => 'Active'
//     ];
// });


$factory->define(App\Capacity::class, function (Faker $faker) {
    return [
		'aircraft_id' => $faker->unique()->randomNumber(),
		'weight_min' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000.00),
		'weight_max' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000.00),
		'height_min' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000.00),
		'height_max' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000.00),
		'width_min' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000.00),
		'width_max' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000.00),
		'length_min' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000.00),
		'length_max' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000.00)
    ];
});
