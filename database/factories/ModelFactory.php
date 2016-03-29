<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'subtitle' => $faker->sentence(mt_rand(2,4)),
        'content' => join("\n\n", $faker->paragraphs(mt_rand(6, 8))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' => factory('App\Post')->create()->id,
        'statement' => join("\n", $faker->paragraphs(mt_rand(1,5))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
    ];
});
