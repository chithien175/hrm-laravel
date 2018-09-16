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
        $this->call(UsersTableSeeder::class);
        $this->call(PhongBansTableSeeder::class);
        $this->call(BoPhansTableSeeder::class);
        $this->call(HoSosTableSeeder::class);
        $this->call(NhanSusTableSeeder::class);
        $this->call(LoaiHopDongsTableSeeder::class);
        $this->call(HopDongsTableSeeder::class);
    }
}
