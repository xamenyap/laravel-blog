<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(5),
        'status' => $faker->randomElement(['pending', 'published']),
    ];
});

$factory->state(App\Models\Post::class, 'published', [
    'status' => 'published'
]);
