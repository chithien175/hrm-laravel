<?php

use Illuminate\Database\Seeder;

class NhanSusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nhan_su = array(
            [
                'ma_nv'              => 'TP0001',
                'ho_ten'             => 'Phạm Đức Chí Thiện',
                'dia_chi_thuong_tru' => '5 An Dương Vương, P.Phước Tân, Nha Trang, Khánh Hòa',
                'dia_chi_lien_he'    => '5 An Dương Vương, P.Phước Tân, Nha Trang, Khánh Hòa',
                'dien_thoai'         => '0905160320',
                'email'              => 'chithien175@gmail.com',
                'gioi_tinh'          => 1,
                'ngay_sinh'          => '1991-05-17',
                'so_cmnd'            => '225477220',
                'ngay_cap_cmnd'      => '2008-03-22',
                'noi_cap_cmnd'       => 'CA. Khánh Hòa',
                'ngay_bat_dau_lam'   => '2018-06-11',
                'trinh_do'           => 'Cao đẳng',
                'truong_tot_nghiep'  => 'CĐ sư phạm Nha Trang',
                'nam_tot_nghiep'     => '2015',
                'chuc_danh'          => 'Nhân viên',
                'phongban_id'        => 1,
                'bophan_id'          => 2,
                'hoso_id'            => '1,3,4,5,8,10'
            ],
            [
                'ma_nv'              => 'TP0002',
                'ho_ten'             => 'Nguyễn Văn A',
                'dia_chi_thuong_tru' => '01 Trần Phú, Lộc Thọ, Nha Trang, Khánh Hòa',
                'dia_chi_lien_he'    => '01 Trần Phú, Lộc Thọ, Nha Trang, Khánh Hòa',
                'dien_thoai'         => '0905123321',
                'email'              => 'nguyenvana@gmail.com',
                'gioi_tinh'          => 1,
                'ngay_sinh'          => '1993-07-20',
                'so_cmnd'            => '225477222',
                'ngay_cap_cmnd'      => '2010-07-03',
                'noi_cap_cmnd'       => 'CA. Phú Yên',
                'ngay_bat_dau_lam'   => '2017-05-20',
                'trinh_do'           => 'Đại học',
                'truong_tot_nghiep'  => 'ĐH Nha Trang',
                'nam_tot_nghiep'     => '2014',
                'chuc_danh'          => 'Trưởng Phòng',
                'phongban_id'        => 1,
                'bophan_id'          => 3,
                'hoso_id'            => '1,2,3,4,5,6,7,8,9'
            ]
        );

        DB::table('nhan_sus')->insert($nhan_su);
    }
}
