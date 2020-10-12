<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Article;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    
    $type = array("text", "video");
    $title = $faker->sentence(4);
    
    return [
        'user_id' => factory(User::class),
        'title' => $title,
        'description' => $faker->paragraph(10),
        'file_path' => $faker->sentence,
        'image_path' => $faker->sentence,
        'type' => $type[rand(0,1)],
        'slug' => Str::slug($title, '-')
    ];
});
