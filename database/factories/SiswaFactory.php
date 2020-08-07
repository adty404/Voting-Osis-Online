<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Siswa;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
        'nis' => $faker->unique()->randomNumber(7),
        'roles' => 'siswa',
        'nama' => $faker->name,
        'kelas' => $faker->randomElement($array = array ('10', '11', '12')),
        'jenis_kelamin' => $faker->randomElement($array = array ('L', 'P')),
        'jurusan' => $faker->randomElement($array = array ('MM', 'TKJ', 'RPL')),
        'status' => 'Belum Voting',
        'validation_code' => str::random(6),
    ];
});
