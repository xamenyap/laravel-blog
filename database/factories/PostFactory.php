<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $fakeParagraph = $faker->paragraph(10);
    $parsedown = new Parsedown();

    return [
        'title' => $faker->sentence(),
        'content' => $fakeParagraph,
        'parsed_content' => $parsedown->text($fakeParagraph),
        'status' => $faker->randomElement(['pending', 'published']),
    ];
});

$factory->state(App\Models\Post::class, 'published', [
    'status' => 'published'
]);
