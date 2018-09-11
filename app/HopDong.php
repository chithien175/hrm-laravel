<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HopDong extends Model
{
    public function scopeGetByNhanSuId($query, $id)
    {
        return $query->where('nhansu_id', $id);
    }

    /**
     * Get the loaihopdong for the hopdong.
     */
    public function loaihopdongs()
    {
        return $this->belongsTo('App\LoaiHopDong', 'loaihopdong_id');
    }

    /**
     * Get the loaihopdong for the hopdong.
     */
    public function nhansus()
    {
        return $this->belongsTo('App\NhanSu', 'nhansu_id');
    }

    public static function saveHopDong($id, $data){
        if($id == 0){
            $hop_dong = new HopDong;
        }else{
            $hop_dong = HopDong::findOrFail($id);
        }
        $hop_dong->nhansu_id            = $data['nhansu_id'];
        $hop_dong->ma_hd                = $data['ma_hd'];
        $hop_dong->ten                  = $data['ten'];
        $hop_dong->loaihopdong_id       = $data['loaihopdong_id'];
        $hop_dong->ngay_ky              = Carbon::parse($data['ngay_ky'])->format('Y-m-d');
        $hop_dong->ngay_co_hieu_luc     = Carbon::parse($data['ngay_co_hieu_luc'])->format('Y-m-d');
        $hop_dong->ngay_het_hieu_luc    = Carbon::parse($data['ngay_het_hieu_luc'])->format('Y-m-d');
        $hop_dong->luong_can_ban        = $data['luong_can_ban'];
        $hop_dong->luong_tro_cap        = $data['luong_tro_cap'];
        $hop_dong->luong_hieu_qua       = $data['luong_hieu_qua'];
        $hop_dong->trang_thai           = $data['trang_thai'];
        // dd($hop_dong);
        $hop_dong->save();
        return $hop_dong;
    }

    public function getNgayKyAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getNgayCoHieuLucAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getNgayHetHieuLucAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
