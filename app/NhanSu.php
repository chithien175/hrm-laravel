<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class NhanSu extends Model
{
    public $timestamps = true;

    /**
     * Get the phongban for the nhansu.
     */
    public function phongbans()
    {
        return $this->belongsTo('App\PhongBan', 'phongban_id');
    }

    /**
     * Get the bophan for the nhansu.
     */
    public function bophans()
    {
        return $this->belongsTo('App\BoPhan', 'bophan_id');
    }

    public static function saveNhanSu($id, $data){
        if($id == 0){
            $nhan_su = new NhanSu;
        }else{
            $nhan_su = NhanSu::findOrFail($id);
            $nhan_su->trang_thai     = $data['trang_thai'];
        }
        $nhan_su->ma_nv              = $data['ma_nv'];
        $nhan_su->ho_ten             = $data['ho_ten'];
        $nhan_su->dia_chi_thuong_tru = $data['dia_chi_thuong_tru'];
        $nhan_su->dia_chi_lien_he    = $data['dia_chi_lien_he'];
        $nhan_su->dien_thoai         = $data['dien_thoai'];
        $nhan_su->email              = $data['email'];
        $nhan_su->gioi_tinh          = $data['gioi_tinh'];
        $nhan_su->ngay_sinh          = Carbon::parse($data['ngay_sinh'])->format('Y-m-d');
        $nhan_su->so_cmnd            = $data['so_cmnd'];
        $nhan_su->ngay_cap_cmnd      = Carbon::parse($data['ngay_cap_cmnd'])->format('Y-m-d');
        $nhan_su->noi_cap_cmnd       = $data['noi_cap_cmnd'];
        $nhan_su->ngay_bat_dau_lam   = Carbon::parse($data['ngay_bat_dau_lam'])->format('Y-m-d');
        $nhan_su->trinh_do           = $data['trinh_do'];
        $nhan_su->truong_tot_nghiep  = $data['truong_tot_nghiep'];
        $nhan_su->nam_tot_nghiep     = $data['nam_tot_nghiep'];
        $nhan_su->chuc_danh          = $data['chuc_danh'];
        $nhan_su->phongban_id        = $data['phongban_id'];
        $nhan_su->bophan_id          = $data['bophan_id'];
        $nhan_su->hoso_id            = json_encode($data['hoso_id']);
        // dd($nhan_su);
        $nhan_su->save();
        return $nhan_su;
    }

    public function getNgaySinhAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getNgayCapCmndAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getNgayBatDauLamAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
