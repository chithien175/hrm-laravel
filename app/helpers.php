<?php
/*
 * Get Total Of Number Staff
 * @status: -1(all)|0(deactive)|1(active)
 * 
 */
if(! function_exists('getTotalOfNumberStaff')){
    function getTotalOfNumberStaff($status){
        $total = 0;
        
        if($status == -1){
            $total = App\NhanSu::all()->count();
        }elseif($status == 0){
            $total = App\NhanSu::where('trang_thai', 0)->get()->count();
        }elseif($status == 1){
            $total = App\NhanSu::where('trang_thai', 1)->get()->count();
        }

        return $total;
    }
}

/*
 * Get tên phòng ban theo phongban_id
 * @phongban_id: string
 * 
 */
if(! function_exists('getTenPhongBanById')){
    function getTenPhongBanById($phongban_id){
        if($phongban_id > 0){
            $tenphongban = App\PhongBan::findOrFail($phongban_id)->ten;
        }else{
            $tenphongban = '';
        }
        return $tenphongban;
    }
}