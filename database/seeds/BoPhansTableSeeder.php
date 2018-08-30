<?php

use Illuminate\Database\Seeder;

class BoPhansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bophans = array(
            [
                'ten'        => 'Thiết Kế',
                'phongban_id' => 1
            ],
            [
                'ten'        => 'IT',
                'phongban_id' => 1
            ],
            [
                'ten'        => 'Bảo Trì',
                'phongban_id' => 1
            ],
            [
                'ten'        => 'Xưởng',
                'phongban_id' => 1
            ],
            [
                'ten'        => 'Kế Toán',
                'phongban_id' => 3
            ],
            [
                'ten'        => 'Cung Ứng',
                'phongban_id' => 3
            ],
            [
                'ten'        => 'Kho',
                'phongban_id' => 3
            ]
        );
        
        DB::table('bo_phans')->insert($bophans);
    }
}
