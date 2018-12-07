<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Article::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'cat_id' => rand(1,10),
        'picture' => str_random(10),
        'preview' => $faker->paragraph,
        'detail' => $faker->paragraph,
        'user_id' => 1,
    ];
});
