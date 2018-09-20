@extends('layouts.master')

@section('title', 'Thêm mới người dùng')

@section('style')
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    
@endsection()

@section('content')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">Bảng Điều Khiển</a>
                    <i class="fa fa-circle"></i>
                    <a href="{{ route('user.index') }}">Danh Sách Người Dùng</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-plus"></i>
            Thêm Người Dùng
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        @if($errors->any())
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            @foreach($errors->all() as $error)
                <p> {{ $error }} </p>
            @endforeach
        </div>
        @endif
        <!-- BEGIN FORM-->
        <form action="{{ route('user.add.post') }}" method="post" id="form_sample_3">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        <label for="form_control_1">Họ tên <span class="required"> * </span></label>
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                        <label for="form_control_1">Email <span class="required"> * </span></label>
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                        <label for="form_control_1">Mật khẩu <span class="required"> * </span></label>
                                        <!-- <span id="name-error" class="help-block help-block-error">Để trống để giữ nguyên.</span> -->
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select class="form-control" name="role[]">
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="form_control_1">Quyền</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                                        <button type="reset" class="btn default"><i class="fa fa-refresh"></i> Làm lại
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </form>
        <!-- END FORM-->
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection

@section('script')
    
@endsection