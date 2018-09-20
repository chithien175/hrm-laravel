@extends('layouts.master')

@section('title', 'Thông báo lỗi')

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
                    <span>Xảy ra lỗi</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            Bạn không có quyền thực hiện chức năng này
        </h1>
        <h1 class="page-title">
            Vui lòng liên hệ người quản trị!
        </h1>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection

@section('script')

@endsection