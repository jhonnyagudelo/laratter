<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use App\Response;
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
        'username' =>$faker->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('secret'),
        'remember_token' => Str::random(10),
        'avatar'=>$faker->imageUrl(300,300, 'people'),
    ];
});

$factory->define(Message::class, function(Faker $faker){
    return [
        'content' => $faker->realText(random_int(20,160)),
        'image' => $faker->imageUrl(600,338),
        'created_at' =>$faker->dateTimeThisDecade(),
        'updated_at' =>$faker->dateTimeThisDecade(),
    ];
});

$factory->define(Response::class, function(Faker $faker){
    return [
        'message' => $faker->words(3, true),
        'created_at' => $faker->dateTimeThisYear(),
        'updated_at' => $faker->dateTimeThisYear(),
    ];
});