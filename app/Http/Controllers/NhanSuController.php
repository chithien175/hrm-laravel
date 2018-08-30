<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\NhanSu;
use App\PhongBan;
use App\HoSo;

class NhanSuController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'only_active_user']);
    }

    public function index(){
        $ds_nhan_su = NhanSu::all();

        return view('nhan_su.browser', ['ds_nhan_su' => $ds_nhan_su]);
    }

    protected function dsPhongBan()
    {
    	$ds_phong_ban = PhongBan::all();

    	return $ds_phong_ban;
    }

    protected function dsHoso()
    {
    	$ds_ho_so = HoSo::all();

    	return $ds_ho_so;
    }

    public function create(){
        $ds_phong_ban = $this->dsPhongBan();
        $ds_ho_so = $this->dsHoso();
        return view('nhan_su.add.index', ['ds_phong_ban' => $ds_phong_ban, 'ds_ho_so' => $ds_ho_so]);
    }

    public function store(Request $request){
        $request->validate([
            'ma_nv'     => 'required|max:20|unique:nhan_sus',
            'ho_ten'     => 'required|max:100',
        ],[
            'ma_nv.required'    => 'Bạn chưa nhập "Mã nhân viên"',
            'ma_nv.max'        => '"Mã nhân viên" đã vượt quá ký tự',
            'ma_nv.unique'      => '"Mã nhân viên" đã tồn tại',
            'ho_ten.required'   => 'Bạn chưa nhập "Họ tên"',
            'ho_ten.max'        => '"Họ tên" đã vượt quá ký tự',
        ]);

        return $request->all();
    }
}
