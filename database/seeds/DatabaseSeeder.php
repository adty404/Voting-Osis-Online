<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(GuruSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(KandidatSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(WaktuMulaiSeeder::class);
        $this->call(WaktuTampilSeeder::class);
    }
}
