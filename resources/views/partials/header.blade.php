<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner" style="width: 100%;">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('/images/logo_name.png') }}" alt="logo" class="logo-default" width="140" /> 
                <!-- <h5 style="padding:7px; color: #fff;">THỊNH PHONG HRM</h5> -->
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class='time-frame hidden-xs' style="float:left; font-size: 12px; color: #fff; padding: 16px; display: -webkit-box;">
            <i class="fa fa-clock-o" style="margin-right: 5px;"></i>
            <div id='datetime-part'></div>
        </div>
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{ asset('uploads/avatars/'.Auth::user()->avatar) }}" />
                        <span class="username username-hide-on-mobile"> {{ (Auth::user())?(Auth::user()->name):'' }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="#">
                                <i class="icon-user"></i> Trang Cá Nhân </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            
                                <a href="{{ route('logout.get') }}">
                                    Đăng Xuất
                                </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->