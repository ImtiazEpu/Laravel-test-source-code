<?php

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

$factory->define(\App\Models\User::class, function (Faker $faker) {
	return [
		'email' => $faker->email,
		'username' => $faker->username,
		'password' => bcrypt(123456789),
		'photo' => $faker->imageUrl(),
		'remember_token' => str_random(10),
	];
});

$factory->define(\App\Models\Category::class, function (Faker $faker) {
	$category = $faker->unique()->name;
	return [
		'name' => $category,
		'slug' => str_slug($category),
	];
});

$factory->define(\App\Models\Post::class, function (Faker $faker) {
	return [
		'user_id' => random_int(1, 5),
		'category_id' => random_int(5, 15),
		'title' => $faker->realText(32),
		'content' => $faker->realText(),
		'thumbnail_path' => $faker->imageUrl(),
	];
});
