<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    @include('partials.head')
    @yield('style')
    @include('partials.style')
    <!-- END HEAD -->

    

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            @include('partials.header')

            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                @include('partials.sidebar')
                
                @yield('content')
            </div>
            <!-- END CONTAINER -->
            
            @include('partials.footer')
        </div>

        @include('partials.script')

        @yield('script')
    </body>

</html>