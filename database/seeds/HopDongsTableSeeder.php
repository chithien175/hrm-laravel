<?php

use Illuminate\Database\Seeder;

class HopDongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hopdongs = array(
            [
                'id'   => 1,
                'nhansu_id' => 1,
                'ma_hd' => 'TP0001/2018/HĐTV-TP',
                'ten' => 'Hợp đồng thử việc',
                'loaihopdong_id' => 1,
                'ngay_ky' => '2018-06-11',
                'ngay_co_hieu_luc' => '2018-06-11',
                'ngay_het_hieu_luc' => '2018-08-10',
                'luong_can_ban' => '3.800.000',
                'luong_tro_cap' => '1.000.000',
                'luong_hieu_qua' => '1.150.000',
                'trang_thai' => 0
            ],
            [
                'id'   => 2,
                'nhansu_id' => 1,
                'ma_hd' => 'TP0001/2018/HĐLĐ-TP',
                'ten' => 'Hợp đồng lao động',
                'loaihopdong_id' => 2,
                'ngay_ky' => '2018-08-11',
                'ngay_co_hieu_luc' => '2018-08-11',
                'ngay_het_hieu_luc' => '2019-08-10',
                'luong_can_ban' => '3.800.000',
                'luong_tro_cap' => '1.000.000',
                'luong_hieu_qua' => '2.200.000',
                'trang_thai' => 1
            ]
           
        );
        
        DB::table('hop_dongs')->insert($hopdongs);
    }
}
