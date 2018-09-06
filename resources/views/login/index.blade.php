@extends('layouts.login')

@section('title', 'Đăng nhập hệ thống')

@section('content')
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="#">
            <img src="{{ asset('/images/logo.png') }}" alt="HRM - Thinh Phong Co., Ltd" /> 
        </a>
        <h3 style="color: #00ff66;">PHẦN MỀM NHÂN SỰ</h3>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content" style="margin-top: 0px;">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{ route('login.post') }}" method="post">
            @csrf()
            <h3 class="form-title font-green">Đăng Nhập</h3>
            @if($errors->any())
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                @foreach($errors->all() as $error)
                    <p> {{ $error }} </p>
                @endforeach
            </div>
            @endif
            
            <!-- MESSAGE -->
            @include('partials.flash-message')

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Mật khẩu</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật khẩu" name="password" /> </div>
            <div class="form-actions">
                <button type="submit" class="btn green uppercase">Đăng nhập</button>
                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1" />Nhớ mật khẩu?
                    <span></span>
                </label>
            </div>
        </form>
        <!-- END LOGIN FORM -->
    </div>
    <div class="copyright"> 2018 © <a href="http://thinhphongnt.vn" target="_blank">Công ty TNHH Thịnh Phong.</a></div>
    
    <!--[if lt IE 9]>
    <script src="../assets/global/plugins/respond.min.js"></script>
    <script src="../assets/global/plugins/excanvas.min.js"></script> 
    <script src="../assets/global/plugins/ie8.fix.min.js"></script> 
    <![endif]-->
@endsection

@section('script')
    <script>
        $(document).ready(function()
        {
            $('#clickmewow').click(function()
            {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>
@endsection()