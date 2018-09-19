@extends('layouts.master')

@section('title', 'Danh sách nhóm quyền')

@section('style')

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
                    {{ $role->display_name }}<small style="margin-left: 25px;"><em>{{ $role->name }}</em></small>
                </h1>
            </div>
            <div class="col-xs-4 text-right" style="margin: 25px 0;">
                <div class="btn-group">
                    <a id="sample_editable_1_new" class="btn btn-sm green" href="{{ route('role.edit', $role->id) }}"><i class="fa fa-edit"></i> Chỉnh sửa
                    </a>
                </div>
            </div>
        </div>
        <!-- MESSAGE -->
        @include('partials.flash-message')
        
        <h6>
            {{ $role->description }}
        </h6>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <h4>Phân quyền:</h4>
                        <ul>
                            @foreach($role->permissions as $v)
                                <li>{{ $v->display_name }} <em style="margin-left: 15px;">({{ $v->description }})</em></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
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

@endsection