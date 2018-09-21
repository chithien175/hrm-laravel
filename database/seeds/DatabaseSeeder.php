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
        $this->call(LaratrustSeeder::class);
        $this->call(PhongBansTableSeeder::class);
        $this->call(HoSosTableSeeder::class);
        $this->call(NhanSusTableSeeder::class);
        $this->call(HopDongsTableSeeder::class);
        $this->call(QuyetDinhsTableSeeder::class);
    }
}
