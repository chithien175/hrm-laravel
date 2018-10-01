<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\QuyetDinh;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class QuyetDinhController extends Controller
{
    public function postThemQuyetDinh(Request $request)
	{
		if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'ma_qd'             => 'required|unique:quyet_dinhs',
                'ngay_ky_qd'        => 'required'
            ],[
                'ma_qd.required'             => 'Vui lòng nhập Mã quyết định',
                'ma_qd.unique'               => 'Mã quyết định đã tồn tại',
                'ngay_ky_qd.required'        => 'Vui lòng nhập Ngày ký quyết định'
            ]);
            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'data'   => $validator->errors()
                ]);
            }

            try{
                $quyet_dinh = QuyetDinh::saveQuyetDinh(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm quyết định ID:'.$quyet_dinh->id.'-'.$quyet_dinh->ma_qd);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimQuyetDinhTheoId(Request $request){
        $quyetdinh = QuyetDinh::findOrFail($request->input('id'));
        if($quyetdinh){
            if($quyetdinh->loaiquyetdinh_id != 0){
                $quyetdinh->loaiquyetdinh_ten = $quyetdinh->loaiquyetdinhs->ten;
            }else{
                $quyetdinh->loaiquyetdinh_ten = '';
            }
            $quyetdinh->ngay = Carbon::parse($quyetdinh->ngay_ky)->day;
            $quyetdinh->thang = Carbon::parse($quyetdinh->ngay_ky)->month;
            $quyetdinh->nam = Carbon::parse($quyetdinh->ngay_ky)->year;
            
            return response()->json([
                'status' => true,
                'data'   => $quyetdinh
            ]);
        }
        return response()->json([
            'status' => false
        ]); 
    }

    public function postSuaQuyetDinh(Request $request)
	{
		if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'ma_qd'             => 'required|unique:quyet_dinhs,ma_qd,'.$request->input('quyetdinh_id'),
                'ngay_ky_qd'        => 'required'
            ],[
                'ma_qd.required'             => 'Vui lòng nhập Mã quyết định',
                'ma_qd.unique'               => 'Mã quyết định đã tồn tại',
                'ngay_ky_qd.required'        => 'Vui lòng nhập Ngày ký quyết định'
            ]);
            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'data'   => $validator->errors()
                ]);
            }

            try{
                $quyet_dinh = QuyetDinh::saveQuyetDinh($request->input('quyetdinh_id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa quyết định ID:'.$quyet_dinh->id.'-'.$quyet_dinh->ma_qd);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postXoaQuyetDinh(Request $request){
        $quyet_dinh = QuyetDinh::findOrFail($request->input('id'));
        $ma_qd = $quyet_dinh->ma_qd;
        try{
            $quyet_dinh->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa quyết định id:'.$request->input('id').'-'.$ma_qd);
            return response()->json([
                'status' => true
            ]);
        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => false,
                'data' => 'Xảy ra lỗi trong quá trình xóa!'
            ]);
        }
    }
}
