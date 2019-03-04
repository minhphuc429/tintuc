<?php

use App\Models\Post;
use Illuminate\Support\Str;
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

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 80),
        'slug' => $faker->slug,
        'description' => $faker->text($maxNbChars = 200),
        'image' => 'http://via.placeholder.com/640x480', //
        'content' => $faker->realText($maxNbChars = 4000, $indexSize = 2),
    ];
});
