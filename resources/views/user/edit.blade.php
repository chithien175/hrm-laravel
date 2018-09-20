@extends('layouts.master')

@section('title', 'Chỉnh sửa người dùng')

@section('style')
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
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
            <i class="fa fa-edit"></i>
            Sửa Người Dùng
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
        <form action="{{ route('user.edit.post') }}" method="post" id="form_sample_3" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="row">
                <div class="col-md-4 text-center col-md-push-8">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                            <img src="<?php if(!empty($user->avatar))echo asset('uploads/avatars').'/'.$user->avatar; else echo 'http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image'; ?>" alt="" />
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"> </div>
                        <div>
                            <span class="btn default btn-file">
                                <span class="fileinput-new"> Chọn ảnh </span>
                                <span class="fileinput-exists"> Thay đổi </span>
                                <input type="file" name="avatar"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hủy </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-md-pull-4">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                        <label for="form_control_1">Họ tên <span class="required"> * </span></label>
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                        <label for="form_control_1">Email <span class="required"> * </span></label>
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" value="">
                                        <label for="form_control_1">Mật khẩu</label>
                                        <span id="name-error" class="help-block help-block-error">Để trống để giữ nguyên.</span>
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select class="form-control" name="role[]">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ ($user->roles[0]->id == $role->id)?'selected':'' }}>{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="form_control_1">Quyền</label>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select class="form-control" name="active">
                                        <option value="1" {{ ($user->active)?'selected':'' }}>Đang hoạt động</option>
                                        <option value="0" {{ (!$user->active)?'selected':'' }}>Vô hiệu hóa</option>
                                    </select>
                                    <label for="form_control_1">Trạng thái</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
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
<script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection