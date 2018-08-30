<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\NhanSu;
use App\PhongBan;

class NhanSuController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'only_active_user']);
    }

    public function index(){
        $ds_nhan_su = NhanSu::all();

        return view('nhan_su.browser', ['ds_nhan_su' => $ds_nhan_su]);
    }

    public function create(){
        $ds_phong_ban = $this->dsPhongBan();

        return view('nhan_su.add.index', ['ds_phong_ban' => $ds_phong_ban]);
    }

    protected function dsPhongBan()
    {
    	$ds_phong_ban = PhongBan::all();

    	return $ds_phong_ban;
    }
}
