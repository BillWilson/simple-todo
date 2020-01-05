<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TodoList;
use Faker\Generator as Faker;

$factory->define(TodoList::class, function (Faker $faker) {
    $items = collect();

    for ($x = 0; $x < 10; $x++) {
        $items->push(['name' => $faker->name]);
    }

    return [
        'title' => $faker->name,
        'content' => $items,
        'attachment' => $faker->url,
        'done_at' => now(),
    ];
});
