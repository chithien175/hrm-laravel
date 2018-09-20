@extends('layouts.master')

@section('title', 'Danh sách nhóm quyền')

@section('style')
<link href="{{ asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />rel="stylesheet" type="text/css" />
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
                    <a href="{{ route('role.index') }}">Nhóm & Phân Quyền</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>{{ $role->display_name }}</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <div class="row">
            <div class="col-xs-8">
                <h1 class="page-title">
                    <i class="fa fa-user-secret"></i>
                    Chỉnh sửa: {{ $role->display_name }}
                </h1>
            </div>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            @foreach($errors->all() as $error)
                <p> {{ $error }} </p>
            @endforeach
        </div>
        @endif
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <hr>

        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal" action="{{ route('role.update', $role->id) }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light portlet-fit bordered">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="bold">Chi tiết nhóm:</h4>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="display_name" class="control-label">Tên hiển thị:</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="name" class="control-label">Slug <em><small>(Trường này không thể chỉnh sửa)</em></small> :</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" disabled name="name" value="{{ $role->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="description" class="control-label">Mô tả:</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="description" value="{{ $role->description }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->

                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light portlet-fit bordered">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="bold">Phân quyền:</h4>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                @foreach($permissions as $k => $permission)
                                                <div class="" style="margin: 0 0 10px 0;">
                                                    <input type="checkbox" class="make-switch" data-size="mini" name="permissions[]" value="{{ $permission->id }}" {{ (in_array($permission->id, $role->permissions->pluck('id')->toArray()))?"checked":"" }}> {{ $permission->display_name }} <em style="margin-left: 15px;">({{ $permission->description }})</em>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                        <div class="btn-group">
                            <button class="btn btn-sm green" type="submit"><i class="fa fa-save"></i> Lưu
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection

@section('script')
<script src="{{ asset('assets/global/plugins/icheck/icheck.min.js') }}" 
@endsection