@extends('layouts.master')

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
                </li>
                <li>
                    <span>Sửa Người Dùng</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
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
                <div class="col-md-8">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-body">
                            <div class="form-body">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                        <label for="form_control_1">Họ tên (*)</label>
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                        <label for="form_control_1">Email (*)</label>
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
                                    <select class="form-control" name="role">
                                        <option value="superadmin" {{ ($user->role == 'superadmin')?'selected':'' }}>Super Admin</option>
                                        <option value="admin" {{ ($user->role == 'admin')?'selected':'' }}>Admin</option>
                                        <option value="user" {{ ($user->role == 'user')?'selected':'' }}>User</option>
                                    </select>
                                    <label for="form_control_1">Quyền</label>
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select class="form-control" name="active">
                                        <option value="1" {{ ($user->active)?'selected':'' }}>Đang hoạt động</option>
                                        <option value="0" {{ (!$user->active)?'selected':'' }}>Khóa</option>
                                    </select>
                                    <label for="form_control_1">Trạng thái</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn dark"><i class="fa fa-save"></i> Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
                <div class="col-md-4 text-center">
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