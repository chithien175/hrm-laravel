<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            @permission('read-dashboard')
            <li class="nav-item start {{ Route::currentRouteName() == 'dashboard' ? 'active open' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Bảng điều khiển</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endpermission
            @permission('read-nhan-su')
            <li class="heading">
                <h3 class="uppercase">Chức năng ứng dụng</h3>
            </li>
            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/staffs' ? 'active open' : '' }}"">
                <a href="{{ route('nhan_su.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Quản trị nhân sự</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endpermission
            @permission('update-file-manager')
            <li class="heading">
                <h3 class="uppercase">Quản trị nâng cao</h3>
            </li>
            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/file-manager' ? 'active open' : '' }}">
                <a href="{{ route('file-manager.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-folder-open"></i>
                    <span class="title">Tập tin & hình ảnh</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endpermission
            @permission('read-users')
            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/users' ? 'active open' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">Người dùng ứng dụng</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endpermission
            @permission('read-acl')
            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/roles' ? 'active open' : '' }}">
                <a href="{{ route('role.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-user-secret"></i>
                    <span class="title">Nhóm & phân quyền</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endpermission
            @permission('update-company')
            <li class="heading">
                <h3 class="uppercase">Cấu Hình</h3>
            </li>
            <li class="nav-item {{ Route::getCurrentRoute()->getPrefix() == '/company' ? 'active open' : '' }}">
                <a href="{{ route('company.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-building"></i>
                    <span class="title">Cấu hình công Ty</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endpermission
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->