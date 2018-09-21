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
        // Seeder Loại hợp đồng
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


        // Seeder Hợp đồng
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
                'luong_tro_cap' => '20.000.000',
                'luong_hieu_qua' => '30.000.000',
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
                'luong_tro_cap' => '40.000.000',
                'luong_hieu_qua' => '50.000.000',
                'trang_thai' => 1
            ],
            [
                'id'   => 3,
                'nhansu_id' => 2,
                'ma_hd' => 'TP0002/2018/HĐTV-TP',
                'ten' => 'Hợp đồng thử việc',
                'loaihopdong_id' => 1,
                'ngay_ky' => '2017-05-20',
                'ngay_co_hieu_luc' => '2017-05-20',
                'ngay_het_hieu_luc' => '2017-07-19',
                'luong_can_ban' => '3.800.000',
                'luong_tro_cap' => '6.000.000',
                'luong_hieu_qua' => '7.150.000',
                'trang_thai' => 0
            ],
            [
                'id'   => 4,
                'nhansu_id' => 2,
                'ma_hd' => 'TP0002/2018/HĐLĐ-TP',
                'ten' => 'Hợp đồng lao động',
                'loaihopdong_id' => 2,
                'ngay_ky' => '2017-07-20',
                'ngay_co_hieu_luc' => '2017-07-20',
                'ngay_het_hieu_luc' => '2018-07-19',
                'luong_can_ban' => '3.800.000',
                'luong_tro_cap' => '5.000.000',
                'luong_hieu_qua' => '3.200.000',
                'trang_thai' => 1
            ]
           
        );
        
        DB::table('hop_dongs')->insert($hopdongs);
    }
}
