<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Staff;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'npk' => $faker->unique()->randomNumber(7),
        'roles' => 'staff',
        'nama' => $faker->name,
        'status' => 'Belum Voting',
        'validation_code' => str::random(6),
    ];
});
