<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function init(){
        // \Setting::set('company.name', 'Công ty TNHH Thịnh Phong');
        // \Setting::set('company.address', '923 Lê Hồng Phong, Phước Long, Nha Trang, Khánh Hòa');
        // \Setting::set('company.phone', '0258 3881168');
        // \Setting::set('company.fax', '0258 3882066');
        // \Setting::set('company.logo', '');
        // \Setting::set('company.nguoi_dai_dien', 'Nguyễn Văn Phong');
        // \Setting::set('company.chuc_vu', 'Giám đốc');
        // \Setting::set('company.quoc_tich', 'Việt Nam');
        // try{
        //     \Setting::save();
        //     Log::info('Người dùng ID:'.Auth::user()->id.' đã khởi tạo thông tin công ty');
        //     return redirect()->route('company.index')->with('status_success', 'Khởi tạo thông tin công ty thành công!');
        // }
        // catch(\Exception $e){
        //     Log::error($e);
        //     return redirect()->route('company.index')->with('status_error', 'Xảy ra lỗi khi khởi tạo thông tin công ty!');
        // }
    }

    public function index(){
        
        return view('company.index');
    }

    public function update(Request $request){

        \Setting::set('company.name', $request->input('name'));
        \Setting::set('company.address', $request->input('address'));
        \Setting::set('company.phone', $request->input('phone'));
        \Setting::set('company.fax', $request->input('fax'));
        \Setting::set('company.website', $request->input('website'));
        \Setting::set('company.nguoi_dai_dien', $request->input('nguoi_dai_dien'));
        \Setting::set('company.chuc_vu', $request->input('chuc_vu'));
        \Setting::set('company.quoc_tich', $request->input('quoc_tich'));

        // Handle the user upload of avatar
    	if($request->hasFile('logo')){
    		$logo = $request->file('logo');
    		$filename = time() .'-logo.'. $logo->getClientOriginalExtension();
            Image::make($logo)->save( public_path('/uploads/logos/' . $filename ) );
            \Setting::set('company.logo', $filename);
        }

        try{
            \Setting::save();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã cập nhật thông tin công ty');
            return redirect()->route('company.index')->with('status_success', 'Cập nhật thông tin công ty thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('company.index')->with('status_error', 'Xảy ra lỗi khi cập nhật thông tin công ty!');
        }
    }
}
