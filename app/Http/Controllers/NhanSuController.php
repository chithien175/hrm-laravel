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
use App\QuyetDinh;
use App\LoaiQuyetDinh;
use Rap2hpoutre\FastExcel\FastExcel;

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
            'ds_hop_dong'   => HopDong::getByNhanSuId($id)->get(),
            'ds_quyet_dinh' => QuyetDinh::getByNhanSuId($id)->get()
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
        return view('nhan_su.add.index', [
            'ds_phong_ban' => PhongBan::all(),
            'ds_ho_so' => HoSo::all()
        ]);
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
            'ds_loai_hd'    => LoaiHopDong::all(),
            'ds_quyet_dinh' => QuyetDinh::getByNhanSuId($id)->get(),
            'ds_loai_qd'    => LoaiQuyetDinh::all()
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

    public function postImportExcel(Request $request){
        if($request->input('excel_link')){
            if(file_exists(storage_path('app/'.$request->input('excel_link')))){

                $file_ext = pathinfo(storage_path('app/'.$request->input('excel_link')), PATHINFO_EXTENSION);

                if($file_ext == 'xlsx' || $file_ext == 'xls' || $file_ext == 'csv'){
                    $collection = (new FastExcel)->import(storage_path('app/'.$request->input('excel_link')));
    
                    if($collection->count() > 0 ){
                        // dd($collection);
                        $trung_ma_nv = '';
                        $trung_so_cmnd = '';
                        $count = 0;
                        foreach($collection as $k => $v){
                            if(!NhanSu::where('ma_nv', $v['ma_nv'])->exists()){
                                if(!NhanSu::where('so_cmnd', $v['so_cmnd'])->exists()){
                                    NhanSu::saveNhanSu(-1, $v);
                                }else{
                                    $count++;
                                    $trung_so_cmnd .= $v['ma_nv'] . '|';
                                }
                            }else{
                                $count++;
                                $trung_ma_nv .= $v['ma_nv'] . '|';
                            }
                        }
                        
                        return response()
                            ->json([
                                'result' => true,
                                'message' => 'Nhập liệu thành công!',
                                'data' => [
                                    'count' => $count,
                                    'trung_ma_nv' => $trung_ma_nv,
                                    'trung_so_cmnd' => $trung_so_cmnd
                                ]
                            ]);
                        
                    }else{
                        return response()->json([
                                'result' => false,
                                'message' => 'Tập tin rỗng!'
                            ]);
                    }
                }else{
                    return response()->json([
                        'result' => false,
                        'message' => 'Định dạng file không đúng!'
                    ]);
                }
                
            }else{
                return response()->json([
                        'result' => false,
                        'message' => 'Tập tin không tồn tại!'
                    ]);
            }
        }else{
            return response()->json([
                        'result' => false,
                        'message' => 'Vui lòng chọn tệp tin!'
                    ]);
        }
    }

    public function exportExcel(){
        $nhan_su = NhanSu::all();

        // Xử lý hồ sơ nhân viên
        foreach($nhan_su as $v){
            $nhan_su_hs = '';
            $hoso_id = json_decode($v->hoso_id);
            foreach( $hoso_id as $k2 => $v2 ){
                if ($v2 === end($hoso_id)) {
                    $nhan_su_hs .= HoSo::getNameById($v2);
                }else{
                    $nhan_su_hs .= HoSo::getNameById($v2) .', ';
                }
            }
            $v->hoso_id = $nhan_su_hs;
        }
        
        return (new FastExcel($nhan_su))->download('ds_nhan_su.xlsx', function($nhan_su){
            $array_export = [
                'Mã NV' => $nhan_su->ma_nv,              
                'Họ tên' => $nhan_su->ho_ten,             
                'Địa chỉ thường trú' => $nhan_su->dia_chi_thuong_tru, 
                'Địa chỉ liên hệ' => $nhan_su->dia_chi_lien_he,    
                'Điện thoại' => $nhan_su->dien_thoai,         
                'Email' => $nhan_su->email,             
                'Giới tính' => ($nhan_su->gioi_tinh == 1) ? 'Nam' : 'Nữ',          
                'Ngày sinh' => $nhan_su->ngay_sinh,        
                'Số CMND' => $nhan_su->so_cmnd,           
                'Ngày cấp CMND' => $nhan_su->ngay_cap_cmnd,     
                'Nơi cấp CMND' => $nhan_su->noi_cap_cmnd,       
                'Ngày bắt đầu làm' => $nhan_su->ngay_bat_dau_lam,  
                'Ngày làm việc cuối' => $nhan_su->ngay_lam_viec_cuoi,   
                'Trình độ' => $nhan_su->trinh_do,          
                'Trường tốt nghiệp' => $nhan_su->truong_tot_nghiep,  
                'Năm tốt nghiệp' => $nhan_su->nam_tot_nghiep,   
                'Chứng chỉ' => $nhan_su->chung_chi,        
                'Chức danh' => $nhan_su->chuc_danh,        
                'Phòng ban' => ($nhan_su->phongban_id != 0) ? $nhan_su->phongbans->ten : '',       
                'Bộ phận' => ($nhan_su->bophan_id != 0) ? $nhan_su->bophans->ten : '',   
                'Hồ sơ' => $nhan_su->hoso_id,   
                'Trạng thái' => ($nhan_su->trang_thai == 1)?'Đang làm việc':'Thôi việc'
            ];
            
            return $array_export;
        });
    }
}
