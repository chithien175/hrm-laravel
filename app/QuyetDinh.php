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
