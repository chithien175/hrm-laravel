<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\HopDong;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HopDongController extends Controller
{
    // AJAX
    public function postThemHopDong(Request $request)
	{
		if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'ma_hd'             => 'required|unique:hop_dongs',
                'ten'               => 'required',
                'ngay_ky'           => 'required',
                'ngay_co_hieu_luc'  => 'required',
                'ngay_het_hieu_luc' => 'required',
                'luong_can_ban'     => 'required',
                'luong_tro_cap'     => 'required',
                'luong_hieu_qua'    => 'required'
            ],[
                'ma_hd.required'             => 'Vui lòng nhập Mã hợp đồng',
                'ma_hd.unique'               => 'Mã hợp đồng đã tồn tại',
                'ten.required'               => 'Vui lòng nhập Tên hợp đồng',
                'ngay_ky.required'           => 'Vui lòng nhập Ngày ký hợp đồng',
                'ngay_co_hieu_luc.required'  => 'Vui lòng nhập Ngày có hiệu lực',
                'ngay_het_hieu_luc.required' => 'Vui lòng nhập Ngày hết hiệu lực',
                'luong_can_ban.required'     => 'Vui lòng nhập Lương căn bản',
                'luong_tro_cap.required'     => 'Vui lòng nhập Hỗ trợ, trợ cấp',
                'luong_hieu_qua.required'    => 'Vui lòng nhập Hiệu quả công việc'
            ]);
            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'data'   => $validator->errors()
                ]);
            }

            try{
                $hop_dong = HopDong::saveHopDong(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm hợp đồng ID:'.$hop_dong->id.'-'.$hop_dong->ma_hd);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimHopDongTheoId(Request $request){
        $hop_dong = HopDong::findOrFail($request->input('id'));
        if($hop_dong){
            if($hop_dong->loaihopdong_id != 0){
                $hop_dong->loaihopdong_ten = $hop_dong->loaihopdongs->ten;
            }else{
                $hop_dong->loaihopdong_ten = '';
            }
            
            return response()->json([
                'status' => true,
                'data'   => $hop_dong
            ]);
        }
        return response()->json([
            'status' => false
        ]); 
    }

    public function postSuaHopDong(Request $request)
	{
		if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'ma_hd'             => 'required|unique:hop_dongs,ma_hd,'.$request->input('hopdong_id'),
                'ten'               => 'required',
                'ngay_ky'           => 'required',
                'ngay_co_hieu_luc'  => 'required',
                'ngay_het_hieu_luc' => 'required',
                'luong_can_ban'     => 'required',
                'luong_tro_cap'     => 'required',
                'luong_hieu_qua'    => 'required'
            ],[
                'ma_hd.required'             => 'Vui lòng nhập Mã hợp đồng',
                'ma_hd.unique'               => 'Mã hợp đồng đã tồn tại',
                'ten.required'               => 'Vui lòng nhập Tên hợp đồng',
                'ngay_ky.required'           => 'Vui lòng nhập Ngày ký hợp đồng',
                'ngay_co_hieu_luc.required'  => 'Vui lòng nhập Ngày có hiệu lực',
                'ngay_het_hieu_luc.required' => 'Vui lòng nhập Ngày hết hiệu lực',
                'luong_can_ban.required'     => 'Vui lòng nhập Lương căn bản',
                'luong_tro_cap.required'     => 'Vui lòng nhập Hỗ trợ, trợ cấp',
                'luong_hieu_qua.required'    => 'Vui lòng nhập Hiệu quả công việc'
            ]);
            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'data'   => $validator->errors()
                ]);
            }

            try{
                $hop_dong = HopDong::saveHopDong($request->input('hopdong_id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa hợp đồng ID:'.$hop_dong->id.'-'.$hop_dong->ma_hd);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }
    // END AJAX

    public function postXoaHopDong(Request $request){
        $hop_dong = HopDong::findOrFail($request->input('id'));
        $ma_hd = $hop_dong->ma_hd;
        try{
            $hop_dong->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa hợp đồng id:'.$request->input('id').'-'.$ma_hd);
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
