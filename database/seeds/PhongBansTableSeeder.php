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
                'ten' => 'Kỹ Thuật'
            ],
            [
                'id'   => 2,
                'ten' => 'Dự Án'
            ],
            [
                'id'   => 3,
                'ten' => 'Tài Chính - Kế Toán'
            ],
            [
                'id'   => 4,
                'ten' => 'Hành Chính - Nhân Sự'
            ],
            [
                'id'   => 5,
                'ten' => 'Kinh Doanh'
            ]
        );
        
        DB::table('phong_bans')->insert($phongbans);
    }
}
