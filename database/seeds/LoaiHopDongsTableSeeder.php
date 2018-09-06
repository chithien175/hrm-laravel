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
                'ten' => 'Hợp Đồng Thử Việc'
            ],
            [
                'id'   => 2,
                'ten' => 'Hợp đồng xác định thời hạn'
            ],
            [
                'id'   => 3,
                'ten' => 'Hợp đồng không xác định thời hạn'
            ],
            [
                'id'   => 4,
                'ten' => 'Hợp đồng đào tạo nghề'
            ]
        );
        
        DB::table('loai_hop_dongs')->insert($loaihopdongs);
    }
}
