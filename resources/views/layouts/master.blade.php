<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    @include('partials.head')

    @include('partials.style')
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        @yield('content')

        @include('partials.script')

        @yield('script')
    </body>

</html>