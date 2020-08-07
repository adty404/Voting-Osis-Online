<?php

use App\WaktuMulai;
use Illuminate\Database\Seeder;

class WaktuMulaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WaktuMulai::create([
            'm_d_y' => '06/16/2020',
            'jam' => '05:00',
        ]);
    }
}
