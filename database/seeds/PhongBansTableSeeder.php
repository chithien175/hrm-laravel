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
        // Seeder Phòng ban
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

        // Seeder Bộ phận
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
