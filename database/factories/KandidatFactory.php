<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kandidat;
use Faker\Generator as Faker;

$factory->define(Kandidat::class, function (Faker $faker) {
    // $randomNumber = rand(1,100);
    // $foto = "https://picsum.photos/id/{$randomNumber}/200/300";

    return [
        'siswa_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'foto' => "default.png",
        'visi' => $faker->sentence(30),
        'misi' => $faker->sentence(30),
    ];
});
