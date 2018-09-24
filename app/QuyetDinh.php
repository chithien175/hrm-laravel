<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class QuyetDinh extends Model
{
    public function scopeGetByNhanSuId($query, $id)
    {
        return $query->where('nhansu_id', $id);
    }

    /**
     * Get the loaiquyetdinh for the quyetdinh.
     */
    public function loaiquyetdinhs()
    {
        return $this->belongsTo('App\LoaiQuyetDinh', 'loaiquyetdinh_id');
    }

    public static function saveQuyetDinh($id, $data){
        if($id == 0){
            $quyet_dinh = new QuyetDinh;
        }else{
            $quyet_dinh = QuyetDinh::findOrFail($id);
        }
        $quyet_dinh->nhansu_id            = $data['nhansu_id'];
        $quyet_dinh->ma_qd                = $data['ma_qd'];
        $quyet_dinh->loaiquyetdinh_id     = $data['loaiquyetdinh_id'];
        $quyet_dinh->ngay_ky              = Carbon::parse($data['ngay_ky_qd'])->format('Y-m-d');
        $quyet_dinh->can_cu               = $data['can_cu'];
        $quyet_dinh->noi_nhan             = $data['noi_nhan'];
        $quyet_dinh->tong_thu_nhap_cu     = $data['tong_thu_nhap_cu'];
        $quyet_dinh->tong_thu_nhap_moi    = $data['tong_thu_nhap_moi'];
        $quyet_dinh->luong_co_ban_moi     = $data['luong_co_ban_moi'];
        $quyet_dinh->luong_tro_cap_moi    = $data['luong_tro_cap_moi'];
        $quyet_dinh->luong_hieu_qua_moi   = $data['luong_hieu_qua_moi'];
        $quyet_dinh->ly_do                = $data['ly_do'];
        $quyet_dinh->chuc_vu_cu           = $data['chuc_vu_cu'];
        $quyet_dinh->chuc_vu_moi          = $data['chuc_vu_moi'];
        $quyet_dinh->bo_phan_cu           = $data['bo_phan_cu'];
        $quyet_dinh->bo_phan_moi          = $data['bo_phan_moi'];
        $quyet_dinh->chuc_vu_hien_tai     = $data['chuc_vu_hien_tai'];
        $quyet_dinh->trang_thai           = $data['trang_thai'];
        // dd($quyet_dinh);
        $quyet_dinh->save();
        return $quyet_dinh;
    }

    public function getNgayKyAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
