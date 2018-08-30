<?php

use Illuminate\Database\Seeder;

class PhongBansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phongbans = array(
            [
                'id'   => 1,
                'ten' => 'Phòng Kỹ Thuật'
            ],
            [
                'id'   => 2,
                'ten' => 'Phòng Dự Án'
            ],
            [
                'id'   => 3,
                'ten' => 'Phòng Tài Chính - Kế Toán'
            ],
            [
                'id'   => 4,
                'ten' => 'Phòng Hành Chính - Nhân Sự'
            ]
        );
        
        DB::table('phong_bans')->insert($phongbans);
    }
}
