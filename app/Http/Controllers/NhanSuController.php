<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\NhanSu;
use App\PhongBan;
use App\BoPhan;
use App\HoSo;

class NhanSuController extends Controller
{

    public function index()
    {
        return view('nhan_su.browser.index', ['ds_nhan_su' => NhanSu::all()]);
    }

    public function read($id)
    {
        $nhan_su = NhanSu::findOrFail($id);
        return view('nhan_su.read.index', ['nhan_su' => $nhan_su]);
    }

    //ajax
    public function dsBoPhanTheoPhongBan(Request $request)
	{
		if ($request->ajax()) {
			return response()->json(BoPhan::getById($request->phongban_id)->get());
		}
	}

    public function create(){
        return view('nhan_su.add.index', ['ds_phong_ban' => PhongBan::all(), 'ds_ho_so' => HoSo::all()]);
    }

    public function store(Request $request){
        $request->validate([
            'ma_nv'        => 'unique:nhan_sus',
            'so_cmnd'        => 'unique:nhan_sus'
        ],[
            'ma_nv.unique' => '"Mã nhân viên" đã tồn tại',
            'so_cmnd.unique' => '"Số CMND" đã tồn tại'
        ]);
        
        try{
            $nhan_su = NhanSu::saveNhanSu($request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm nhân sự ID:'.$nhan_su->id.'-'.$nhan_su->ho_ten);
            return redirect()->route('nhan_su.index')->with('status_success', 'Tạo mới nhân sự thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('nhan_su.index')->with('status_error', 'Xảy ra lỗi khi thêm nhân sự!');
        }
    }
}
