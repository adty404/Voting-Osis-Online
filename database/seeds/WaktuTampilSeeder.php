<?php

use App\WaktuTampil;
use Illuminate\Database\Seeder;

class WaktuTampilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WaktuTampil::create([
            'm_d_y' => '06/18/2020',
            'jam' => '16:00',
        ]);
    }
}
