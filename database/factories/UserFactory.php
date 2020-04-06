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

$factory->define(User::class, function(Faker $faker)
{
	return [
		'name'              => $faker->name,
		'email'             => $faker->unique()->safeEmail,
		'password'          => '$2y$10$HJoiRBuivtopycBruXP/2uL12lrnsQaj9ep9Kul9Cy/P6Td56mobW', // 123456
		'type'              => \App\User::TYPE_USER,
		'mobile'            => '093380' . random_int(11111, 99999),
		'avatar'            => null,
		'verify_code'     => null,
		'verified_at'       => now(),
	];
});
