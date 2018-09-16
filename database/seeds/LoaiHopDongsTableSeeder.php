<?php

use Illuminate\Database\Seeder;

class LoaiHopDongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loaihopdongs = array(
            [
                'id'   => 1,
                'ten' => 'Thử việc'
            ],
            [
                'id'   => 2,
                'ten' => 'Xác định thời hạn'
            ],
            [
                'id'   => 3,
                'ten' => 'Không xác định thời hạn'
            ],
            [
                'id'   => 4,
                'ten' => 'Đào tạo nghề'
            ]
        );
        
        DB::table('loai_hop_dongs')->insert($loaihopdongs);
    }
}
