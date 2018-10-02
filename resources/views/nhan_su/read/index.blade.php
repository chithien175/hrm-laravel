@extends('layouts.master')

@section('title', 'Thông tin nhân sự')

@section('style')
    <link href="{{ asset('assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
            <i class="fa fa-user"></i> {{ $nhan_su->ma_nv }} - {{ $nhan_su->ho_ten }}
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
                    <ul class="nav nav-pills">
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
                        <div class="tab-content">
                            <!-- BEGIN TAB 1-->
                            <div class="tab-pane active" id="tab1">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Mã NV:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->ma_nv }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Họ tên:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->ho_ten }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Địa chỉ thường trú:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->dia_chi_thuong_tru }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Địa chỉ liên hệ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->dia_chi_lien_he }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Điện thoại:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->dien_thoai }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Email:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->email }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Giới tính:</label>
                                                @if($nhan_su->gioi_tinh)
                                                    <label class="control-label col-md-7 col-xs-6">Nam</label>
                                                @else
                                                    <label class="control-label col-md-7 col-xs-6">Nữ</label>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Ngày sinh:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->ngay_sinh }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Số CMND:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->so_cmnd }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Ngày cấp CMND:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->ngay_cap_cmnd }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Nơi cấp CMND:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->noi_cap_cmnd }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Ngày bắt đầu làm:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->ngay_bat_dau_lam }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Ngày làm việc cuối:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->ngay_lam_viec_cuoi }}</label>
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
                                                <label class="control-label col-md-4 col-xs-6 bold">Trình độ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->trinh_do }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Trường tốt nghiệp:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->truong_tot_nghiep }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Năm tốt nghiệp:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->nam_tot_nghiep }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chứng chỉ:</label>
                                                <label class="control-label col-md-7 col-xs-6">{!! $nhan_su->chung_chi !!}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Chức danh:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ $nhan_su->chuc_danh }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Phòng ban:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ ($nhan_su->phongban_id !=0)?$nhan_su->phongbans->ten:'' }}</label>
                                            </div>
                                            <div class="row">
                                                <label class="control-label col-md-4 col-xs-6 bold">Bộ phận:</label>
                                                <label class="control-label col-md-7 col-xs-6">{{ ($nhan_su->bophan_id)?$nhan_su->bophans->ten:'' }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <!-- END BEGIN TAB 2-->
                            <!-- BEGIN TAB 3-->
                            <div class="tab-pane" id="tab3">
                                <div class="form-body">
                                    @if($nhan_su->hoso_id)
                                        @php
                                            $ho_so = explode(',', $nhan_su->hoso_id);
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
                                    @else
                                        @php
                                            $ds_ho_so = App\HoSo::all()->pluck('ten','id');
                                        @endphp
                                        <div class="row">
                                            <div class="input-group col-md-12">
                                                @foreach($ds_ho_so as $k => $v)
                                                    <label class="control-label col-md-3 col-xs-6 font-grey-steel"><i class="glyphicon glyphicon-remove-sign font-yellow-casablanca"></i> {{ $v }}</label>
                                                   
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- END BEGIN TAB 3-->

                            <!-- BEGIN TAB 4-->
                            <div class="tab-pane" id="tab4">
                                @if($ds_hop_dong->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <!-- <th> Mã HĐ</th> -->
                                                    <th> Loại HĐ </th>
                                                    <th> Vào làm</th>
                                                    <th> Đến ngày</th>
                                                    <th> Lương CB </th>
                                                    <th> Hỗ trợ </th>
                                                    <th> Thưởng HQ </th>
                                                    <th> Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( $ds_hop_dong->count() > 0 )
                                                    @php $stt = 1; @endphp
                                                    @foreach( $ds_hop_dong as $v )
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <!-- <td> {{ $v->ma_hd }} </td> -->
                                                        <td> {{ ($v->loaihopdong_id)?$v->loaihopdongs->ten:'' }} </td>
                                                        <td> {{ $v->ngay_co_hieu_luc }} </td>
                                                        <td> {{ $v->ngay_het_hieu_luc }} </td>
                                                        <td> {{ $v->luong_can_ban }} </td>
                                                        <td> {{ $v->luong_tro_cap }} </td>
                                                        <td> {{ $v->luong_hieu_qua }} </td>
                                                        <td> 
                                                            @if( $v->trang_thai )
                                                            <span class="label label-sm label-success" style="font-size: 12px;"> Còn hiệu lực </span>
                                                            @else
                                                            <span class="label label-sm label-danger" style="font-size: 12px;"> Hết hiệu lực </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @php $stt++; @endphp
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                @else
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                        <p> Nhân sự này chưa có HĐLĐ!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 4-->
                            
                            
                            <!-- BEGIN TAB 5-->
                            <div class="tab-pane" id="tab5">
                                @if($ds_quyet_dinh->isNotEmpty())
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <div class="row">
                                            @foreach($ds_quyet_dinh as $v)
                                            <div class="col-md-12">
                                                <div class="mt-element-ribbon bg-grey-steel">
                                                    
                                                    @if($v->trang_thai)
                                                    <div class="ribbon ribbon-right ribbon-vertical-right ribbon-shadow ribbon-border-dash-vert ribbon-color-info">
                                                        <div class="ribbon-sub ribbon-bookmark"></div>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="ribbon ribbon-left ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-info">
                                                        <div class="ribbon-sub ribbon-clip ribbon-left"></div>Số: {{ $v->ma_qd }} (Đã ký)</div>
                                                    @else
                                                    <div class="ribbon ribbon-right ribbon-vertical-right ribbon-shadow ribbon-border-dash-vert ribbon-color-default">
                                                        <div class="ribbon-sub ribbon-bookmark"></div>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="ribbon ribbon-left ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-default">
                                                        <div class="ribbon-sub ribbon-clip ribbon-left"></div>Số: {{ $v->ma_qd }} (Chưa ký)</div>
                                                    @endif
                                                    <div class="row" style="padding: 50px 15px 5px 15px;">
                                                        <div class="col-md-6 bold">
                                                        V/v: {{ ($v->loaiquyetdinh_id)?$v->loaiquyetdinhs->ten:'' }}
                                                        </div>
                                                        <div class="col-md-6">
                                                        Ngày ký: {{ $v->ngay_ky }}
                                                        </div>
                                                    </div>
                                                    
                                                    @if($v->loaiquyetdinh_id == 1)
                                                        <div class="row" style="padding: 0px 15px 5px 15px;">
                                                            <div class="col-md-6">
                                                                Tổng thu nhập cũ: {{ $v->tong_thu_nhap_cu }}
                                                            </div>
                                                            <div class="col-md-6">
                                                                Lương cơ bản mới: {{ $v->luong_co_ban_moi }}
                                                            </div>
                                                        </div>
                                                        <div class="row" style="padding: 0px 15px 5px 15px;">
                                                            <div class="col-md-6">
                                                                Tổng thu nhập mới: {{ $v->tong_thu_nhap_moi }}
                                                            </div>
                                                            <div class="col-md-6">
                                                                Lương trợ cấp mới: {{ $v->luong_tro_cap_moi }}
                                                            </div>
                                                        </div>
                                                        <div class="row" style="padding: 0px 15px 20px 15px;">
                                                            <div class="col-md-6">
                                                                Lý do: {{ $v->ly_do }}
                                                            </div>
                                                            <div class="col-md-6">
                                                                Lương hiệu quả mới: {{ $v->luong_hieu_qua_moi }}
                                                            </div>
                                                        </div>
                                                    @elseif($v->loaiquyetdinh_id == 2)
                                                        <div class="row" style="padding: 0px 15px 5px 15px;">
                                                            <div class="col-md-6">
                                                                Chức vụ cũ: {{ $v->chuc_vu_cu }}
                                                            </div>
                                                            <div class="col-md-6">
                                                                Bộ phận cũ: Phòng {{ getTenPhongBanById($v->bo_phan_cu) }}
                                                            </div>
                                                        </div>
                                                        <div class="row" style="padding: 0px 15px 20px 15px;">
                                                            <div class="col-md-6">
                                                                Chức vụ mới: {{ $v->chu_vu_moi }}
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                Bộ phận mới: Phòng {{ getTenPhongBanById($v->bo_phan_moi) }}
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    @elseif($v->loaiquyetdinh_id == 3)
                                                        <div class="row" style="padding: 0px 15px 20px 15px;">
                                                            <div class="col-md-6">
                                                                Chức vụ hiện tại: {{ $v->chuc_vu_hien_tai }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                @else
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                        <p> Nhân sự này chưa có quyết định!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 5-->
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
<script>
    $(document).ready(function(){
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
    });
</script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
@endsection