<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\NhanSu;
use App\PhongBan;
use App\BoPhan;
use App\HoSo;
use App\HopDong;
use App\LoaiHopDong;

class NhanSuController extends Controller
{

    public function index()
    {
        return view('nhan_su.browser.index', ['ds_nhan_su' => NhanSu::all()]);
    }

    public function read($id)
    {
        $nhan_su = NhanSu::findOrFail($id);
        return view('nhan_su.read.index', [
            'nhan_su' => $nhan_su,
            'ds_hop_dong'   => HopDong::getByNhanSuId($id)->get()
        ]);
    }

    // AJAX function
    public function dsBoPhanTheoPhongBan(Request $request)
	{
		if ($request->ajax()) {
			return response()->json(BoPhan::getByPhongBanId($request->phongban_id)->get());
		}
    }
    // END AJAX

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
            $nhan_su = NhanSu::saveNhanSu(0, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm nhân sự ID:'.$nhan_su->id.'-'.$nhan_su->ho_ten);
            return redirect()->route('nhan_su.index')->with('status_success', 'Tạo mới nhân sự thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('nhan_su.index')->with('status_error', 'Xảy ra lỗi khi thêm nhân sự!');
        }
    }

    public function edit($id){

        return view('nhan_su.edit.index', [
            'nhan_su'       => NhanSu::findOrFail($id), 
            'ds_phong_ban'  => PhongBan::all(),
            'ds_ho_so'      => HoSo::all()->pluck('ten','id'),
            'ds_hop_dong'   => HopDong::getByNhanSuId($id)->get(),
            'ds_loai_hd'    => LoaiHopDong::all()
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'ma_nv'        => 'unique:nhan_sus,ma_nv,'.$id,
            'so_cmnd'        => 'unique:nhan_sus,so_cmnd,'.$id
        ],[
            'ma_nv.unique' => '"Mã nhân viên" đã tồn tại',
            'so_cmnd.unique' => '"Số CMND" đã tồn tại'
        ]);

        try{
            $nhan_su = NhanSu::saveNhanSu($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa nhân sự ID:'.$nhan_su->id.'-'.$nhan_su->ho_ten);
            return redirect()->route('nhan_su.index')->with('status_success', 'Chỉnh sửa nhân sự thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('nhan_su.index')->with('status_error', 'Xảy ra lỗi khi sửa nhân sự!');
        }
        
    }

    public function destroy($id){
        $nhan_su = NhanSu::findOrFail($id);
        $name = $nhan_su->ho_ten;
        try{
            $nhan_su->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa nhân sự id:'.$id.'-'.$name);
            return redirect()->route('nhan_su.index')->with('status_success', 'Xóa nhân sự thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('nhan_su.index')->with('status_error', 'Xảy ra lỗi khi xóa nhân sự!');
        }
    }

    public function importExcel(){
        return view('nhan_su.import.index');
    }

    public function uploadExcel(){
        return response()->json('success', 200);
    }
}
