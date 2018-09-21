@extends('layouts.master')

@section('title', 'Danh sách nhân sự')

@section('style')
    <link href="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/colorbox/colorbox1.css') }}" rel="stylesheet" type="text/css" />
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
            <i class="fa fa-file-excel-o"></i>
            Nhập liệu nhân sự bằng file Excel
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-6">
                <form id="import_form" class="form-horizontal" action="{{ route('nhan_su.import-excel.post') }}" method="post">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input class="form-control" type="text" id="excel_link" name="excel_link" value="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-default popup_selector" data-inputid="excel_link">Chọn tập tin</a>
                                <a id="import_btn" href="#" class="btn blue">Nhập liệu</a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-md-12">
                    <div class="" id="result">
                    </div>
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

        $(document).ajaxStart(function() { 
            Pace.start(); 
        }).ajaxStop(function(){
            Pace.stop();
        });
        
        $("#import_btn").on('click', function(e){
            e.preventDefault();

            var url = "{{ route('nhan_su.import-excel.post') }}";
            var token = $("input[name='_token']").val();
            var excel_link = $("input[name='excel_link']").val();

            Pace.track(function(){
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        excel_link: excel_link,
                        _token: token
                    },
                    success: function(data) {
                        // console.log(data);
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "positionClass": "toast-bottom-right",
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
                        
                        if(data.result == false){
                            var msg = data.message;
                            toastr["error"](msg, "Lỗi");
                            $('#result').html('');
                        }else if(data.result == true){
                            var msg = data.message;
                            toastr["success"](msg, "Thành công");
                            $('#result').html('<p>Số nhân sự không được nhập: '+data.data.count+'</p><p>Lý do trùng ID: '+data.data.trung_ma_nv+'</p><p>Lý do trùng CMND: '+data.data.trung_so_cmnd+'</p>');
                        }
                    }
                });
            });
            
        });
    })
</script>
<script src="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="{{ asset('packages/barryvdh/elfinder/js/standalonepopup.min.js') }}"></script>

@endsection