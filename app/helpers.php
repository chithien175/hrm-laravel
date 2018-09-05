<?php
/*
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