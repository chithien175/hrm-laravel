@extends('layouts.master')

@section('title', 'Danh sách nhóm quyền')

@section('style')
<link href="{{ asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
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
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
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
                                                <label for="display_name" class="control-label">Tên hiển thị</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="name" class="control-label">Slug</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" disabled name="name" value="{{ $role->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="description" class="control-label">Mô tả</label>
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
                                                <?php
                                                    // dd([$permissions, $role->permissions->pluck('name','id')->toArray()]);
                                                ?>
                                                <div class="icheck-inline">
                                                    @foreach($permissions as $k => $permission)
                                                    <label class="col-md-12" style="margin: 0 0 10px 0;">
                                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck" {{ (in_array($permission->name, $role->permissions->pluck('name')->toArray()))?"checked":"" }}> {{ $permission->display_name }} <em style="margin-left: 15px;">({{ $permission->description }})</em>
                                                    </label>
                                                    @endforeach
                                                </div>
                                                
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
<script src="{{ asset('assets/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
@endsection