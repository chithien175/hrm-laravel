@extends('layouts.master')

@section('title', 'Danh sách người dùng')

@section('style')
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" /> -->
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
                    <span>Danh Sách Người Dùng</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-list-ul"></i>
            Danh Sách Người Dùng
        </h1>

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
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" href="{{ route('user.add.get') }}"><i class="fa fa-plus"></i> Thêm mới
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_nguoi_dung">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Họ Tên </th>
                                    <th> Email </th>
                                    <th> Quyền </th>
                                    <th> Trạng thái</th>
                                    <th> Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php $stt = 1; @endphp
                                    @foreach( $users as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->name }} </td>
                                        <td> {{ $v->email }} </td>
                                        <td>
                                            @foreach($v->roles as $role)
                                                {{ $role->display_name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($v->active)
                                                <span class="label label-sm label-success"> Kích hoạt </span>
                                            @else
                                                <span class="label label-sm label-danger"> Vô hiệu hóa </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-xs yellow-gold" href="{{ route('user.edit.get', $v->id) }}" title="Xem"> <i class="fa fa-edit"></i> Sửa</a>
                                            <a class="btn btn-xs red-mint" href="{{ route('user.delete.get', $v->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    @php $stt++; @endphp
                                    @endforeach
                            </tbody>
                        </table>
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
<script>
    jQuery(document).ready(function() {
        var table = $('#ds_nguoi_dung');

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
    });
</script>

<script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
@endsection