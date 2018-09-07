@extends('layouts.master')

@section('title', 'Chỉnh sửa nhân sự')

@section('style')
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
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
            <i class="fa fa-edit"></i> Chỉnh sửa | {{ $nhan_su->ma_nv }} - {{ $nhan_su->ho_ten }}
            @if( $nhan_su->trang_thai )
            <span class="label label-sm bg-green-jungle"> Đang làm </span>
            @else
            <span class="label label-sm label-danger"> Thôi việc </span>
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
                    <ul class="nav nav-pills" id="#myTab">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">Thông tin</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">Trình độ</a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab">QĐ lương</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">HĐLĐ</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Hồ sơ</a>
                        </li>
                    </ul>
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form" id="form_wizard_1">
                        <!-- BEGIN FORM-->
                        @include('nhan_su.edit.form')
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
        // Reload trang và giữ nguyên tab đã active
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
            localStorage.removeItem('activeTab');
        }
        // END Reload trang và giữ nguyên tab đã active
        

        $("#ngay_sinh").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("#ngay_cap_cmnd").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("#ngay_bat_dau_lam").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("#ngay_ky_hd").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("#ngay_co_hieu_luc").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("#ngay_het_hieu_luc").inputmask("d-m-y", {
            // autoUnmask: true
        });


        // Ajax lấy ds bộ phận theo phòng ban
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
        // END Ajax lấy ds bộ phận theo phòng ban

        // Ajax thêm hợp đồng
        $("#btn_add_hd").on('click', function(e){
            e.preventDefault();

            $.ajax({
                url: '{{ route('postThemHopDong') }}',
                method: 'POST',
                data: {
                    nhansu_id: $("#form_add_hd input[name='nhansu_id']").val(),
                    ma_hd: $("#form_add_hd input[name='ma_hd']").val(),
                    ten: $("#form_add_hd input[name='ten']").val(),
                    loaihopdong_id: $("#form_add_hd .loaihopdong_id").val(),
                    ngay_ky: $("#form_add_hd input[name='ngay_ky']").val(),
                    ngay_co_hieu_luc: $("#form_add_hd input[name='ngay_co_hieu_luc']").val(),
                    ngay_het_hieu_luc: $("#form_add_hd input[name='ngay_het_hieu_luc']").val(),
                    luong_can_ban: $("#form_add_hd input[name='luong_can_ban']").val(),
                    luong_tro_cap: $("#form_add_hd input[name='luong_tro_cap']").val(),
                    luong_hieu_qua: $("#form_add_hd input[name='luong_hieu_qua']").val(),
                    trang_thai: $("#form_add_hd .trang_thai").val(),
                    _token: $("#form_add_hd input[name='_token']").val()
                },
                success: function(data) {
                    if(data.status == false){
                        var errors = "";
                        $.each(data.data, function(key, value){
                            $.each(value, function(key2, value2){
                                errors += value2 +"<br>";
                            });
                        });
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "positionClass": "toast-top-center",
                            "onclick": null,
                            "showDuration": "1000",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["error"](errors, "Lỗi")
                    }
                    if(data.status == true){
                        $('#modal_add_hd').modal('hide');
                        swal({
                            "title":"Thành công!", 
                            "text":"Bạn đã tạo thành công hợp đồng!",
                            "type":"success"
                        }, function() {
                                localStorage.setItem('activeTab', '#tab4');
                                location.reload();
                            }
                        );
                    }
                }
            });
        });
        // END Ajax thêm hợp đồng

        // Cấu hình bảng ds hợp đồng
        var table = $('#table_ds_hd');
        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,

            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });
        // END Cấu hình bảng ds hợp đồng

        // Khi click vào nút sửa hđ
        $(".btn_edit_hd").on("click", function(){
            var hd_key = $(this).data("hd-key");
            var hd_data =   '{{ $ds_hop_dong['+$(this).data("hd-key")+']->id }}';
            alert(hd_data);
        });
    });
</script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection