<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guru;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Guru::class, function (Faker $faker) {
    return [
        'npk' => $faker->unique()->randomNumber(7),
        'roles' => 'guru',
        'nama' => $faker->name,
        'status' => 'Belum Voting',
        'validation_code' => str::random(6),
    ];
});
