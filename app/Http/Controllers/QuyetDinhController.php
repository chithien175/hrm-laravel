<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\QuyetDinh;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
}
