<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('login.index');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:6|max:32' 
        ],[
            'email.required'    => 'Bạn chưa nhập "Email"',
            'email.email'       => '"Email" không đúng định dạng',
            'password.required' => 'Bạn chưa nhập "Mật khẩu"',
            'password.min'      => '"Mật khẩu" phải ít nhất 6 ký tự',
            'password.max'      => '"Mật khẩu" không quá 32 ký tự'
        ]);
        $remember = $request->has('remember') ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            return redirect('/');
        }else{
            return redirect()->back()->with('status', 'Đăng nhập thất bại');
        }
    }
}
