<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Book;
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

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'author' => $faker->name,
        'synopsys' => $faker->paragraph,
        'publisher' => $faker->company,
        'date_published' => $faker->dateTime,
        'isbn13' => $faker->isbn13,
    ];
});
