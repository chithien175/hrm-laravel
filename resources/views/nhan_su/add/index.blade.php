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
                    <span>Thêm Nhân Sự</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-plus"></i> Thêm Nhân Sự
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
                            @include('nhan_su.add.form')
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
<script>
    $(document).ready(function()
    {
        $("#ngay_sinh").inputmask("d/m/y", {
            autoUnmask: true
        });
        $("#ngay_cap_cmnd").inputmask("d/m/y", {
            autoUnmask: true
        });
        $("#ngay_bat_dau_lam").inputmask("d/m/y", {
            autoUnmask: true
        });

        var url = "{{ route('dsBoPhanTheoPhongBan') }}";
        $("select[name='phongban_id']").change(function(){
            var phongban_id = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    phongban_id: phongban_id,
                    _token: token
                },
                success: function(data) {
                    $("select[name='bophan_id'").html('');
                    $("select[name='bophan_id']").append(
                        "<option value='0'>-------- Chọn bộ phận --------</option>"
                    );
                    $.each(data, function(key, value){
                        $("select[name='bophan_id']").append(
                            "<option value=" + value.id + ">" + value.ten + "</option>"
                        );
                    });
                }
            });
        });
    })
</script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
@endsection