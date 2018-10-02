@extends('layouts.master')

@section('title', 'Chỉnh sửa nhân sự')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
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
                            <a href="#tab3" data-toggle="tab">Hồ sơ</a>
                        </li>
                        <li>
                            <a href="#tab4" data-toggle="tab">HĐLĐ</a>
                        </li>
                        <li>
                            <a href="#tab5" data-toggle="tab">Quyết định</a>
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
        $("#ngay_lam_viec_cuoi").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("input[name='ngay_ky']").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("input[name='ngay_co_hieu_luc']").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("input[name='ngay_het_hieu_luc']").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("input[name='ngay_ky_qd']").inputmask("d-m-y", {
            // autoUnmask: true
        });

        // Ajax lấy ds bộ phận theo phòng ban
        $("select[name='phongban_id']").change(function(){
            var phongban_id = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "{{ route('dsBoPhanTheoPhongBan') }}",
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
            $("#btn_add_hd").attr("disabled", "disabled");
            $("#btn_add_hd").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
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
                    $("#btn_add_hd").removeAttr("disabled"); 
                    $("#btn_add_hd").html('<i class="fa fa-save"></i> Lưu');
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
                            "title":"Đã tạo!", 
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

        // Cấu hình bảng ds quyết định
        $('#table_ds_qd').dataTable({

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
        // END Cấu hình bảng ds quyết định

        // Khi click vào nút sửa hđ, tìm hđ theo id và đỗ dữ liệu vào form
        $(".btn_edit_hd").on("click", function(e){
            e.preventDefault();
            var hd_id = $(this).data("hd-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimHopDongTheoId') }}',
                method: 'POST',
                data: {
                    id: hd_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $("#form_edit_hd input[name='hopdong_id']").val(data.data.id);
                        $("#form_edit_hd input[name='nhansu_id']").val(data.data.nhansu_id);
                        $("#form_edit_hd input[name='ma_hd']").val(data.data.ma_hd);
                        $("#form_edit_hd input[name='ten']").val(data.data.ten);
                        $("#form_edit_hd select[name='loaihopdong_id']").val(data.data.loaihopdong_id);
                        $("#form_edit_hd input[name='ngay_ky']").val(data.data.ngay_ky);
                        $("#form_edit_hd input[name='ngay_co_hieu_luc']").val(data.data.ngay_co_hieu_luc);
                        $("#form_edit_hd input[name='ngay_het_hieu_luc']").val(data.data.ngay_het_hieu_luc);
                        $("#form_edit_hd input[name='luong_can_ban']").val(data.data.luong_can_ban);
                        $("#form_edit_hd input[name='luong_hieu_qua']").val(data.data.luong_hieu_qua);
                        $("#form_edit_hd input[name='luong_tro_cap']").val(data.data.luong_tro_cap);
                        $("#form_edit_hd select[name='trang_thai']").val(data.data.trang_thai);
                        $('#modal_edit_hd').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa hđ, tìm hđ theo id và đỗ dữ liệu vào form

        // Ajax sửa hợp đồng
        $("#btn_edit_hd").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_hd").attr("disabled", "disabled");
            $("#btn_edit_hd").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajax({
                url: '{{ route('postSuaHopDong') }}',
                method: 'POST',
                data: {
                    hopdong_id: $("#form_edit_hd input[name='hopdong_id']").val(),
                    nhansu_id: $("#form_edit_hd input[name='nhansu_id']").val(),
                    ma_hd: $("#form_edit_hd input[name='ma_hd']").val(),
                    ten: $("#form_edit_hd input[name='ten']").val(),
                    loaihopdong_id: $("#form_edit_hd .loaihopdong_id").val(),
                    ngay_ky: $("#form_edit_hd input[name='ngay_ky']").val(),
                    ngay_co_hieu_luc: $("#form_edit_hd input[name='ngay_co_hieu_luc']").val(),
                    ngay_het_hieu_luc: $("#form_edit_hd input[name='ngay_het_hieu_luc']").val(),
                    luong_can_ban: $("#form_edit_hd input[name='luong_can_ban']").val(),
                    luong_tro_cap: $("#form_edit_hd input[name='luong_tro_cap']").val(),
                    luong_hieu_qua: $("#form_edit_hd input[name='luong_hieu_qua']").val(),
                    trang_thai: $("#form_edit_hd .trang_thai").val(),
                    _token: $("#form_edit_hd input[name='_token']").val()
                },
                success: function(data) {
                    $("#btn_edit_hd").removeAttr("disabled"); 
                    $("#btn_edit_hd").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_edit_hd').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công hợp đồng!",
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
        // END Ajax sửa hợp đồng

        // Xử lý khi click nút xóa hợp đồng
        $(".btn_delete_hd").on("click", function(e){
            e.preventDefault();
            var hd_id = $(this).data("hd-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa hợp đồng này?",
                text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: 'Không',
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Có, xóa ngay!",
                closeOnConfirm: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            url: '{{ route('postXoaHopDong') }}',
                            method: 'POST',
                            data: {
                                id: hd_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công hợp đồng!",
                                        "type":"success"
                                    }, function() {
                                            localStorage.setItem('activeTab', '#tab4');
                                            location.reload();
                                        }
                                    );
                                }
                            }
                        });
                    }   
            });

        });
        // END Xử lý khi click nút xóa hợp đồng

        // Khi click vào nút xem hđ, tìm hđ theo id và đỗ dữ liệu
        $(".btn_read_hd").on("click", function(e){
            e.preventDefault();
            var hd_id = $(this).data("hd-id");
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimHopDongTheoId') }}',
                method: 'POST',
                data: {
                    id: hd_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        $('#read-hdld .ma-hdld').html("Số: "+data.data.ma_hd);
                        $('#read-hdld .ten-hdld').html(data.data.ten);
                        $('#read-hdld .ten-loai-hdld').html(data.data.loaihopdong_ten);
                        $('#read-hdld .thoi-han-hdld').html("Từ ngày: <strong>"+data.data.ngay_co_hieu_luc.replace(/-/g,'/')+"</strong> Đến hết ngày: <strong>"+data.data.ngay_het_hieu_luc.replace(/-/g,'/')+"</strong>");
                        $('#read-hdld .luong-can-ban-hdld').html(data.data.luong_can_ban+" đồng/tháng");
                        $('#read-hdld .luong-tro-cap-hdld').html(data.data.luong_tro_cap+" đồng/tháng");
                        $('#read-hdld .luong-hieu-qua-hdld').html(data.data.luong_hieu_qua+" đồng/tháng");
                        $('#read-hdld .ngay-ky-hdld').html(data.data.ngay_ky.replace(/-/g,'/'));
                        $('#modal_read_hd').modal('show');
                        
                    }
                }
            });
        });
        // END Khi click vào nút xem hđ, tìm hđ theo id và đỗ dữ liệu

        // Ajax thêm quyết định
        $("#btn_add_qd").on('click', function(e){
            e.preventDefault();
            $("#btn_add_qd").attr("disabled", "disabled");
            $("#btn_add_qd").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajax({
                url: '{{ route('postThemQuyetDinh') }}',
                method: 'POST',
                data: {
                    nhansu_id: $("#form_add_qd input[name='nhansu_id']").val(),
                    ma_qd: $("#form_add_qd input[name='ma_qd']").val(),
                    ten: $("#form_add_qd input[name='ten']").val(),
                    loaiquyetdinh_id: $("#form_add_qd .loaiquyetdinh_id").val(),
                    ngay_ky_qd: $("#form_add_qd input[name='ngay_ky_qd']").val(),
                    can_cu: $("#form_add_qd input[name='can_cu']").val(),
                    noi_nhan: $("#form_add_qd input[name='noi_nhan']").val(),
                    tong_thu_nhap_cu: $("#form_add_qd input[name='tong_thu_nhap_cu']").val(),
                    tong_thu_nhap_moi: $("#form_add_qd input[name='tong_thu_nhap_moi']").val(),
                    luong_co_ban_moi: $("#form_add_qd input[name='luong_co_ban_moi']").val(),
                    luong_tro_cap_moi: $("#form_add_qd input[name='luong_tro_cap_moi']").val(),
                    luong_hieu_qua_moi: $("#form_add_qd input[name='luong_hieu_qua_moi']").val(),
                    ly_do: $("#form_add_qd input[name='ly_do']").val(),
                    chuc_vu_cu: $("#form_add_qd input[name='chuc_vu_cu']").val(),
                    chuc_vu_moi: $("#form_add_qd input[name='chuc_vu_moi']").val(),
                    bo_phan_cu: $("#form_add_qd select[name='bo_phan_cu']").val(),
                    bo_phan_moi: $("#form_add_qd select[name='bo_phan_moi']").val(),
                    chuc_vu_hien_tai: $("#form_add_qd input[name='chuc_vu_hien_tai']").val(),
                    trang_thai: $("#form_add_qd .trang_thai").val(),
                    _token: $("#form_add_qd input[name='_token']").val()
                },
                success: function(data) {
                    $("#btn_add_qd").removeAttr("disabled"); 
                    $("#btn_add_qd").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_add_qd').modal('hide');
                        swal({
                            "title":"Đã tạo!", 
                            "text":"Bạn đã tạo thành công quyết định!",
                            "type":"success"
                        }, function() {
                                localStorage.setItem('activeTab', '#tab5');
                                location.reload();
                            }
                        );
                    }
                }
            });
        });
        // END Ajax thêm quyết định

        // Xử lý khi click chọn loại quyết định
        // Add
        $('#form_add_qd .loaiquyetdinh_id').on('change', function() {
            if(this.value == '1'){
                $('#form_add_qd .type1_qd').show();
                $('#form_add_qd .type2_qd').hide();
                $('#form_add_qd .type3_qd').hide();
            }
            if(this.value == '2'){
                $('#form_add_qd .type1_qd').hide();
                $('#form_add_qd .type2_qd').show();
                $('#form_add_qd .type3_qd').hide();
            }
            if(this.value == '3'){
                $('#form_add_qd .type1_qd').hide();
                $('#form_add_qd .type2_qd').hide();
                $('#form_add_qd .type3_qd').show();
            }
        });
        
        // Edit
        $('#form_edit_qd .loaiquyetdinh_id').on('change', function() {
            if(this.value == '1'){
                $('#form_edit_qd .type1_qd').show();
                $('#form_edit_qd .type2_qd').hide();
                $('#form_edit_qd .type3_qd').hide();
            }
            if(this.value == '2'){
                $('#form_edit_qd .type1_qd').hide();
                $('#form_edit_qd .type2_qd').show();
                $('#form_edit_qd .type3_qd').hide();
            }
            if(this.value == '3'){
                $('#form_edit_qd .type1_qd').hide();
                $('#form_edit_qd .type2_qd').hide();
                $('#form_edit_qd .type3_qd').show();
            }
        });
        // END Xử lý khi click chọn loại quyết định

        // Khi click vào nút sửa quyết định, tìm quyết định theo id và đỗ dữ liệu vào form
        $(".btn_edit_qd").on("click", function(e){
            e.preventDefault();
            var qd_id = $(this).data("qd-id");
            // $('#modal_edit_qd').modal('show');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimQuyetDinhTheoId') }}',
                method: 'POST',
                data: {
                    id: qd_id
                },
                success: function(data) {
                    if(data.status == true){
                        // console.log(data.data);
                        if(data.data.loaiquyetdinh_id == 1){
                            $('#form_edit_qd .type1_qd').show();
                            $('#form_edit_qd .type2_qd').hide();
                            $('#form_edit_qd .type3_qd').hide();
                        }
                        if(data.data.loaiquyetdinh_id == 2){
                            $('#form_edit_qd .type1_qd').hide();
                            $('#form_edit_qd .type2_qd').show();
                            $('#form_edit_qd .type3_qd').hide();
                        }
                        if(data.data.loaiquyetdinh_id == 3){
                            $('#form_edit_qd .type1_qd').hide();
                            $('#form_edit_qd .type2_qd').hide();
                            $('#form_edit_qd .type3_qd').show();
                        }
                        $("#form_edit_qd input[name='quyetdinh_id']").val(data.data.id);
                        $("#form_edit_qd input[name='nhansu_id']").val(data.data.nhansu_id);
                        $("#form_edit_qd input[name='ma_qd']").val(data.data.ma_qd);
                        $("#form_edit_qd select[name='loaiquyetdinh_id']").val(data.data.loaiquyetdinh_id);
                        $("#form_edit_qd input[name='ngay_ky_qd']").val(data.data.ngay_ky);
                        $("#form_edit_qd input[name='can_cu']").val(data.data.can_cu);
                        $("#form_edit_qd input[name='noi_nhan']").val(data.data.noi_nhan);
                        $("#form_edit_qd select[name='trang_thai']").val(data.data.trang_thai);
                        $("#form_edit_qd input[name='tong_thu_nhap_cu']").val(data.data.tong_thu_nhap_cu);
                        $("#form_edit_qd input[name='tong_thu_nhap_moi']").val(data.data.tong_thu_nhap_moi);
                        $("#form_edit_qd input[name='luong_co_ban_moi']").val(data.data.luong_co_ban_moi);
                        $("#form_edit_qd input[name='luong_tro_cap_moi']").val(data.data.luong_tro_cap_moi);
                        $("#form_edit_qd input[name='luong_hieu_qua_moi']").val(data.data.luong_hieu_qua_moi);
                        $("#form_edit_qd input[name='ly_do']").val(data.data.ly_do);
                        $("#form_edit_qd input[name='chuc_vu_cu']").val(data.data.chuc_vu_cu);
                        $("#form_edit_qd input[name='chuc_vu_moi']").val(data.data.chuc_vu_moi);
                        if(data.data.bo_phan_cu){
                            $("#form_edit_qd select[name='bo_phan_cu']").val(data.data.bo_phan_cu);
                        }else{
                            $("#form_edit_qd select[name='bo_phan_cu']").val('0');
                        }
                        if(data.data.bo_phan_moi){
                            $("#form_edit_qd select[name='bo_phan_moi']").val(data.data.bo_phan_moi);
                        }else{
                            $("#form_edit_qd select[name='bo_phan_moi']").val('0');
                        }
                        $("#form_edit_qd input[name='chuc_vu_hien_tai']").val(data.data.chuc_vu_hien_tai);
                        $('#modal_edit_qd').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút sửa quyết định, tìm quyết định theo id và đỗ dữ liệu vào form

        // Ajax sửa quyết định
        $("#btn_edit_qd").on('click', function(e){
            e.preventDefault();
            $("#btn_edit_qd").attr("disabled", "disabled");
            $("#btn_edit_qd").html('<i class="fa fa-spinner fa-spin"></i> Lưu');
            $.ajax({
                url: '{{ route('postSuaQuyetDinh') }}',
                method: 'POST',
                data: {
                    quyetdinh_id: $("#form_edit_qd input[name='quyetdinh_id']").val(),
                    nhansu_id: $("#form_edit_qd input[name='nhansu_id']").val(),
                    ma_qd: $("#form_edit_qd input[name='ma_qd']").val(),
                    loaiquyetdinh_id: $("#form_edit_qd select[name='loaiquyetdinh_id']").val(),
                    ngay_ky_qd: $("#form_edit_qd input[name='ngay_ky_qd']").val(),
                    can_cu: $("#form_edit_qd input[name='can_cu']").val(),
                    noi_nhan: $("#form_edit_qd input[name='noi_nhan']").val(),
                    trang_thai: $("#form_edit_qd select[name='trang_thai']").val(),
                    tong_thu_nhap_cu: $("#form_edit_qd input[name='tong_thu_nhap_cu']").val(),
                    tong_thu_nhap_moi: $("#form_edit_qd input[name='tong_thu_nhap_moi']").val(),
                    luong_co_ban_moi: $("#form_edit_qd input[name='luong_co_ban_moi']").val(),
                    luong_tro_cap_moi: $("#form_edit_qd input[name='luong_tro_cap_moi']").val(),
                    luong_hieu_qua_moi: $("#form_edit_qd input[name='luong_hieu_qua_moi']").val(),
                    ly_do: $("#form_edit_qd input[name='ly_do']").val(),
                    chuc_vu_cu: $("#form_edit_qd input[name='chuc_vu_cu']").val(),
                    chuc_vu_moi: $("#form_edit_qd input[name='chuc_vu_moi']").val(),
                    bo_phan_cu: $("#form_edit_qd select[name='bo_phan_cu']").val(),
                    bo_phan_moi: $("#form_edit_qd select[name='bo_phan_moi']").val(),
                    chuc_vu_hien_tai: $("#form_edit_qd input[name='chuc_vu_hien_tai']").val(),
                    _token: $("#form_edit_qd input[name='_token']").val()
                },
                success: function(data) {
                    $("#btn_edit_qd").removeAttr("disabled"); 
                    $("#btn_edit_qd").html('<i class="fa fa-save"></i> Lưu');
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
                        $('#modal_edit_qd').modal('hide');
                        swal({
                            "title":"Đã sửa!", 
                            "text":"Bạn đã sửa thành công quyết định!",
                            "type":"success"
                        }, function() {
                                localStorage.setItem('activeTab', '#tab5');
                                location.reload();
                            }
                        );
                    }
                }
            });
        });
        // END Ajax sửa quyết định

        // Xử lý khi click nút xóa quyết định
        $(".btn_delete_qd").on("click", function(e){
            e.preventDefault();
            var qd_id = $(this).data("qd-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            swal({
                title: "Xóa quyết định này?",
                text: "Bạn có chắc không, nó sẽ bị xóa vĩnh viễn!",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: 'Không',
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Có, xóa ngay!",
                closeOnConfirm: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            url: '{{ route('postXoaQuyetDinh') }}',
                            method: 'POST',
                            data: {
                                id: qd_id
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.status == true){
                                    swal({
                                        "title":"Đã xóa!", 
                                        "text":"Bạn đã xóa thành công quyết định!",
                                        "type":"success"
                                    }, function() {
                                            localStorage.setItem('activeTab', '#tab5');
                                            location.reload();
                                        }
                                    );
                                }
                            }
                        });
                    }   
            });
        });
        // END Xử lý khi click nút xóa quyết định

        // Khi click vào nút xem qđ, tìm qđ theo id và đỗ dữ liệu
        $(".btn_read_qd").on("click", function(e){
            e.preventDefault();
            var qd_id = $(this).data("qd-id");
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('postTimQuyetDinhTheoId') }}',
                method: 'POST',
                data: {
                    id: qd_id
                },
                success: function(data) {
                    if(data.status == true){
                        console.log(data.data);
                        if(data.data.loaiquyetdinh_id == 1){
                            $('.loai-qd-1').show();
                            $('.loai-qd-2').hide();
                            $('.loai-qd-3').hide();
                        }
                        if(data.data.loaiquyetdinh_id == 2){
                            $('.loai-qd-1').hide();
                            $('.loai-qd-2').show();
                            $('.loai-qd-3').hide();
                        }
                        if(data.data.loaiquyetdinh_id == 3){
                            $('.loai-qd-1').hide();
                            $('.loai-qd-2').hide();
                            $('.loai-qd-3').show();
                        }
                        $('#read-qd .ma-qd').html("Số: "+data.data.ma_qd);
                        $('#read-qd .ngay-qd').html(data.data.ngay);
                        $('#read-qd .thang-qd').html(data.data.thang);
                        $('#read-qd .nam-qd').html(data.data.nam);
                        $('#read-qd .ten-loai-qd').html('(V/v: '+data.data.loaiquyetdinh_ten+')');
                        var cancu_qd = data.data.can_cu.split(";");
                        var cancu_qd_html = '';
                        $.each(cancu_qd, function (index, value) {
                            cancu_qd_html += '- ' + value + '<br>';
                        });
                        $('#read-qd .can-cu-qd').html(cancu_qd_html);
                        $('#read-qd .tong-thu-nhap-cu').html('<span class="bold">'+data.data.tong_thu_nhap_cu+'</span> VNĐ/tháng');
                        $('#read-qd .tong-thu-nhap-moi').html('<span class="bold">'+data.data.tong_thu_nhap_moi+'</span> VNĐ/tháng. Trong đó:');
                        $('#read-qd .luong-co-ban-moi').html(data.data.luong_co_ban_moi+'VNĐ/tháng.');
                        $('#read-qd .luong-tro-cap-moi').html(data.data.luong_tro_cap_moi+'VNĐ/tháng.');
                        $('#read-qd .luong-hieu-qua-moi').html(data.data.luong_hieu_qua_moi+'VNĐ/tháng.');
                        $('#read-qd .ly-do-dieu-chinh').html('Lý do điều chỉnh: '+data.data.ly_do);
                        $('#read-qd .ngay-ky-qd').html(data.data.ngay_ky.replace(/-/g,'/'));
                        var noinhan_qd = data.data.noi_nhan.split(";");
                        var noinhan_qd_html = '';
                        $.each(noinhan_qd, function (index, value) {
                            noinhan_qd_html += '- ' + value + '<br>';
                        });
                        $('#read-qd .noi-nhan-qd').html(noinhan_qd_html);
                        // $('#read-hdld .luong-can-ban-hdld').html(data.data.luong_can_ban+" đồng/tháng");
                        // $('#read-hdld .luong-tro-cap-hdld').html(data.data.luong_tro_cap+" đồng/tháng");
                        // $('#read-hdld .luong-hieu-qua-hdld').html(data.data.luong_hieu_qua+" đồng/tháng");
                        // $('#read-hdld .ngay-ky-hdld').html(data.data.ngay_ky.replace(/-/g,'/'));
                        $('#modal_read_qd').modal('show');
                        
                    }
                }
            });
        });
        // END Khi click vào nút xem qđ, tìm qđ theo id và đỗ dữ liệu
    });
</script>

<script>
// Xử lý in hđlđ
document.getElementById("btn-print-hd").onclick = function () {
    printElement(document.getElementById("print-hdld"));
};

// Xử lý in qd
document.getElementById("btn-print-qd").onclick = function () {
    printElement(document.getElementById("print-qd"));
};

function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
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