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
        $("input[name='ngay_ky']").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("input[name='ngay_co_hieu_luc']").inputmask("d-m-y", {
            // autoUnmask: true
        });
        $("input[name='ngay_het_hieu_luc']").inputmask("d-m-y", {
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
                        console.log(data.data);
                        $('#read-hdld .ma-hdld').html("Số: "+data.data.ma_hd);
                        $('#read-hdld .ten-hdld').html(data.data.ten);
                        $('#read-hdld .ten-loai-hdld').html(data.data.loaihopdong_ten);
                        $('#read-hdld .thoi-han-hdld').html("Từ ngày: <strong>"+data.data.ngay_co_hieu_luc+"</strong> Đến hết ngày: <strong>"+data.data.ngay_het_hieu_luc+"</strong>");
                        $('#read-hdld .luong-can-ban-hdld').html(data.data.luong_can_ban+" đồng/tháng");
                        $('#read-hdld .luong-tro-cap-hdld').html(data.data.luong_tro_cap+" đồng/tháng");
                        $('#read-hdld .luong-hieu-qua-hdld').html(data.data.luong_hieu_qua+" đồng/tháng");
                        $('#read-hdld .ngay-ky-hdld').html(data.data.ngay_ky);
                        $('#modal_read_hd').modal('show');
                    }
                }
            });
        });
        // END Khi click vào nút xem hđ, tìm hđ theo id và đỗ dữ liệu
    });
</script>
<script>
// Xử lý in hđlđ
document.getElementById("btn-print-hd").onclick = function () {
    printElement(document.getElementById("print-hdld"));
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