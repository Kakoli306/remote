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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Developer::class, function (Faker $faker) {
    return [
        'language_id' => \App\Language::all()->random()->id,
        'programming_language_id' => \App\ProgrammingLanguage::all()->random()->id,
        'email' => $faker->unique()->safeEmail,

    ];
});

$factory->define(App\Language::class, function (Faker $faker) {
    return [
        'code' => $faker->languageCode,

    ];
});

$factory->define(App\ProgrammingLanguage::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Java', 'PHP','C','C++','C#','Ruby','Javascript',
            'Go','Swift','Python']),

    ];
});
