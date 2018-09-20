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
                </li>
                <li>
                    <span>Nhóm & Phân Quyền</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <div class="row">
            <div class="col-xs-8">
                <h1 class="page-title">
                    <i class="fa fa-list-ul"></i>
                    Quản Lý Nhóm & Phân Quyền
                </h1>
            </div>
            <div class="col-xs-4 text-right" style="margin: 25px 0;">
                <div class="btn-group">
                    <a id="sample_editable_1_new" class="btn btn-sm green" href="{{ route('role.create') }}"><i class="fa fa-plus"></i> Thêm mới
                    </a>
                </div>
            </div>
        </div>
        
        

        <!-- MESSAGE -->
        @include('partials.flash-message')

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="row">
                            @foreach($roles as $role)
                            <div class="col-md-4">
                                <div class="mt-element-ribbon bg-grey-steel">
                                    <div class="ribbon ribbon-right ribbon-vertical-right ribbon-shadow ribbon-border-dash-vert ribbon-color-primary uppercase">
                                        <div class="ribbon-sub ribbon-bookmark"></div>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="ribbon ribbon-left ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-info uppercase">
                                        <div class="ribbon-sub ribbon-clip ribbon-left"></div> {{ $role->display_name }} </div>
                                    <p class="ribbon-content">{{ $role->description }}</p>
                                    <div class="btn-group">
                                        <a href="{{ route('role.show', $role->id) }}" class="btn blue"><i class="fa fa-eye"></i> Chi tiết</a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-default"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
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