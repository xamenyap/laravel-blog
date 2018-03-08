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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'role' => 2,
    ];
});

$factory->state(App\Models\User::class, 'admin', [
    'name' => 'admin',
    'email' => 'admin@demo.com',
    'password' => bcrypt('123456'),
    'role' => 1
]);

$factory->state(App\Models\User::class, 'demo_user', [
    'name' => 'demo',
    'email' => 'demo@demo.com',
    'password' => bcrypt('123456'),
]);
