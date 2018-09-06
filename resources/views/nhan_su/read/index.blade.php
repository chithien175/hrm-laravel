@extends('layouts.master')

@section('title', 'Thông tin nhân sự')

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
                    <a href="{{ route('nhan_su.index') }}">Nhân Sự Công Ty</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-user"></i> {{ $nhan_su->ma_nv }} - {{ $nhan_su->ho_ten }}
            @if( $nhan_su->trang_thai )
            <span class="label label-md label-success"> Đang làm </span>
            @else
            <span class="label label-md label-danger"> Thôi việc </span>
            @endif
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
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Mã NV:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->ma_nv }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Họ tên:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->ho_ten }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Địa chỉ thường trú:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->dia_chi_thuong_tru }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Địa chỉ liên hệ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->dia_chi_lien_he }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Điện thoại:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->dien_thoai }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Email:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->email }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Giới tính:</label>
                                                @if($nhan_su->gioi_tinh)
                                                    <label class="control-label col-md-7 col-xs-6">Nam</label>
                                                @else
                                                    <label class="control-label col-md-7 col-xs-6">Nữ</label>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Ngày sinh:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ (new \Carbon\Carbon($nhan_su->ngay_sinh))->format('d-m-Y') }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Số CMND:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->so_cmnd }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Ngày cấp CMND:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ (new \Carbon\Carbon($nhan_su->ngay_cap_cmnd))->format('d-m-Y') }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Nơi cấp CMND:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->noi_cap_cmnd }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Ngày bắt đầu làm:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ (new \Carbon\Carbon($nhan_su->ngay_bat_dau_lam))->format('d-m-Y') }}</label>
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
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Trình độ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->trinh_do }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Trường tốt nghiệp:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->truong_tot_nghiep }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Năm tốt nghiệp:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->nam_tot_nghiep }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Chức danh:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->chuc_danh }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Phòng ban:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->phongbans->ten }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6">Bộ phận:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->bophans->ten }}</label>
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
                                    @if($nhan_su->hoso_id)
                                        @php
                                            $ho_so = json_decode($nhan_su->hoso_id);
                                            $ds_ho_so = App\HoSo::all()->pluck('ten','id');
                                        @endphp
                                        <div class="row">
                                            <div class="input-group col-md-12">
                                                @foreach($ds_ho_so as $k => $v)
                                                    @if(in_array($k, $ho_so))
                                                    <label class="control-label col-md-3 col-xs-6"><i class="glyphicon glyphicon-ok-sign font-green"></i> {{ $v }}</label>
                                                    @else
                                                    <label class="control-label col-md-3 col-xs-6 font-grey-steel"><i class="glyphicon glyphicon-remove-sign font-yellow-casablanca"></i> {{ $v }}</label>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
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