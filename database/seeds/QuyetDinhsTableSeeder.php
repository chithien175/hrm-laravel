<?php

use Illuminate\Database\Seeder;

class QuyetDinhsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder Loại quyết định
        $loaiquyetdinhs = array(
            [
                'id'   => 1,
                'ten' => 'Điều chỉnh tổng thu nhập'
            ],
            [
                'id'   => 2,
                'ten' => 'Điều chuyển công tác'
            ],
            [
                'id'   => 3,
                'ten' => 'Chấm dứt hợp đồng lao động'
            ]
        );
        DB::table('loai_quyet_dinhs')->insert($loaiquyetdinhs);

        // Seeder Quyết định
        $quyetdinhs = array(
            [
                'id'   => 1,
                'nhansu_id' => 1,
                'ma_qd' => '2607/02/2018/QĐ-TP',
                'loaiquyetdinh_id' => 1,
                'ngay_ky' => '2018-07-26',
                'can_cu' => 'Căn cứ vào Nội quy và Quy chế của Công ty;Căn cứ quyền hạn của Giám đốc Công ty TNHH Thịnh Phong;Xét năng lực của Ông Trương Tấn Công',
                'noi_nhan' => 'Điều 3;Lưu HC-NS',
                'trang_thai' => 1
            ],
            [
                'id'   => 2,
                'nhansu_id' => 1,
                'ma_qd' => '2607/2018/QĐ-TP',
                'loaiquyetdinh_id' => 2,
                'ngay_ky' => '2018-07-26',
                'can_cu' => '',
                'noi_nhan' => '',
                'trang_thai' => 1
            ],
            [
                'id'   => 3,
                'nhansu_id' => 1,
                'ma_qd' => '3107/2018/QĐ-TP',
                'loaiquyetdinh_id' => 3,
                'ngay_ky' => '2018-07-31',
                'can_cu' => '',
                'noi_nhan' => '',
                'trang_thai' => 0
            ]
        );
        
        DB::table('quyet_dinhs')->insert($quyetdinhs);
    }
}
