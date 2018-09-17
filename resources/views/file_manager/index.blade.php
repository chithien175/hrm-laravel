@extends('layouts.master')

@section('title', 'Quản lý tập tin')

@section('style')
<!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="<?= asset('packages/barryvdh/elfinder/css/elfinder.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('packages/barryvdh/elfinder/css/theme.css') ?>">

    
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
                    <span>Quản lý tập tin</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            <i class="fa fa-file"></i>
            Quản lý tập tin
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>
                
        <div class="clearfix"></div>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection

@section('script')
<!-- jQuery and jQuery UI (REQUIRED) -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<!-- elFinder JS (REQUIRED) -->
<script src="<?= asset('packages/barryvdh/elfinder/js/elfinder.min.js') ?>"></script>
<!-- elFinder translation (OPTIONAL) -->
<script src="{{ asset('packages/barryvdh/elfinder/js/i18n/elfinder.'.app()->getLocale() .'.js') }}"></script>

<!-- elFinder initialization (REQUIRED) -->
<script type="text/javascript" charset="utf-8">
    // Documentation for client options:
    // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
    jQuery(document).ready(function() {
        $('#elfinder').elfinder({
            // set your elFinder options here
                lang: '{{ app()->getLocale() }}', // locale
            customData: { 
                _token: '<?= csrf_token() ?>'
            },
            url : '<?= route("elfinder.connector") ?>',  // connector URL
            soundPath: '<?= asset('packages/barryvdh/elfinder/sounds') ?>'
        });
    });
</script>
@endsection
