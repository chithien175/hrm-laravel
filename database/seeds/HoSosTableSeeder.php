<?php

use Illuminate\Database\Seeder;

class HoSosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hosos = array(
            ['ten' => 'Phiếu thông tin ứng viên'],
            ['ten' => 'Giảm trừ gia cảnh'],
            ['ten' => 'Sơ yếu lý lịch'],
            ['ten' => 'Đơn xin việc'],
            ['ten' => 'Chứng minh nhân dân'],
            ['ten' => 'Giấy khám sức khỏe'],
            ['ten' => 'Giấy khai sinh'],
            ['ten' => 'Bằng chính (ĐH, CĐ, TC)'],
            ['ten' => 'Chứng chỉ'],
            ['ten' => 'Hộ khẩu']
        );
        
        DB::table('ho_sos')->insert($hosos);
    }
}
