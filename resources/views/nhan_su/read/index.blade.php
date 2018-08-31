@extends('layouts.master')

@section('style')
    <!-- <link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" /> -->
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
                </li>
                <li>
                    <span>Thông tin nhân sự: {{ $nhan_su->ho_ten }}</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-user"></i> Thông tin nhân sự: {{ $nhan_su->ho_ten }}
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
        <div class="row">
            <div class="col-md-12">
                    <div class="tabbable tabbable-tabdrop">
                        <ul class="nav nav-pills">
                            <li class="active">
                                <a href="#tab1" data-toggle="tab">Thông tin cá nhân</a>
                            </li>
                            <li>
                                <a href="#tab2" data-toggle="tab">Thông tin trình độ</a>
                            </li>
                            <li>
                                <a href="#tab3" data-toggle="tab">Thông tin lương</a>
                            </li>
                            <li>
                                <a href="#tab4" data-toggle="tab">Thông tin hợp đồng</a>
                            </li>
                            <li>
                                <a href="#tab5" data-toggle="tab">Thông tin hồ sơ</a>
                            </li>
                        </ul>
                        <!-- BEGIN VALIDATION STATES-->
                        <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
                            <!-- BEGIN FORM-->
                            <div class="tab-content">
                                <!-- BEGIN TAB 1-->
                                <div class="tab-pane active" id="tab1">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Mã NV:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->ma_nv }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Họ tên:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->ho_ten }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Địa chỉ thường trú:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->dia_chi_thuong_tru }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Địa chỉ liên hệ:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->dia_chi_lien_he }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Điện thoại:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->dien_thoai }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Email:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->email }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Giới tính:</label>
                                                    @if($nhan_su->gioi_tinh)
                                                        <label class="control-label col-md-7">Nam</label>
                                                    @else
                                                        <label class="control-label col-md-7">Nữ</label>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Ngày sinh:</label>
                                                    <label class="control-label col-md-7">{{ (new \Carbon\Carbon($nhan_su->ngay_sinh))->format('d-m-Y') }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Số CMND:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->so_cmnd }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Ngày cấp CMND:</label>
                                                    <label class="control-label col-md-7">{{ (new \Carbon\Carbon($nhan_su->ngay_cap_cmnd))->format('d-m-Y') }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Nơi cấp CMND:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->noi_cap_cmnd }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Ngày bắt đầu làm:</label>
                                                    <label class="control-label col-md-7">{{ (new \Carbon\Carbon($nhan_su->ngay_bat_dau_lam))->format('d-m-Y') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TAB 1-->
                                <!-- BEGIN TAB 2-->
                                <div class="tab-pane" id="tab2">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Trình độ:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->trinh_do }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Trường tốt nghiệp:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->truong_tot_nghiep }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Năm tốt nghiệp:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->nam_tot_nghiep }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Chức danh:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->chuc_danh }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Phòng ban:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->phongbans->ten }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Bộ phận:</label>
                                                    <label class="control-label col-md-7">{{ $nhan_su->bophans->ten }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Vui lòng tạo mới nhân sự trước khi thêm lương! </p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab4">
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                            <p> Vui lòng tạo mới nhân sự trước khi thêm hợp đồng! </p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab5">
                                    <div class="form-body">
                                            <div class="form-group">
                                                <div class="input-group col-md-12">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                    </div>
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
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
@endsection