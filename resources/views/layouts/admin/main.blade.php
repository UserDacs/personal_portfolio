<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>ADMIN</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ================== BEGIN core-css ================== -->
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/material/app.min.css') }}" rel="stylesheet" />
    <!-- ================== END core-css ================== -->

    <!-- ================== BEGIN page-css ================== -->
    <link href="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/plugins/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <!-- ================== END page-css ================== -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .quicksand { font-family: 'Quicksand', sans-serif; }
    </style>
    @stack('style')

    <!-- ================== BEGIN core-js ================== -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- ================== END core-js ================== -->

    <!-- ================== BEGIN page-js ================== -->
    <script src="{{ asset('assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.canvaswrapper.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.colorhelpers.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.saturated.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.browser.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.drawSeries.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.uiConstants.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.navigate.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.touchNavigate.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.hover.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.touch.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/source/jquery.flot.legend.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap-content/world-mill.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/demo/dashboard.js') }}"></script>

    <script src="{{ asset('https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
    <!-- ================== END page-js ================== -->
    <script>
    // Custom Toast Functions
    var toast = {
        success: function(message) {
            $('#toastTitle').text('Success');
            $('#toastBody').text(message);
            $('#myToast').removeClass('bg-danger bg-warning bg-info').addClass(
                'bg-success'); // Set success background
            showToast();
        },
        error: function(message) {
            $('#toastTitle').text('Error');
            $('#toastBody').text(message);
            $('#myToast').removeClass('bg-success bg-warning bg-info').addClass(
                'bg-danger'); // Set error background
            showToast();
        },
        warning: function(message) {
            $('#toastTitle').text('Warning');
            $('#toastBody').text(message);
            $('#myToast').removeClass('bg-success bg-danger bg-info').addClass(
                'bg-warning'); // Set warning background
            showToast();
        },
        info: function(message) {
            $('#toastTitle').text('Info');
            $('#toastBody').text(message);
            $('#myToast').removeClass('bg-success bg-danger bg-warning').addClass(
                'bg-info'); // Set info background
            showToast();
        }
    };

    // Show Toast Function
    function showToast() {
        var myToast = new bootstrap.Toast($('#myToast')[0]);
        myToast.show();
    }
    </script>
</head>

<body style="font-family: 'Ubuntu Mono', monospace !important;">
    <!-- BEGIN #loader -->
    <div id="loader" class="app-loader">
        <div class="material-loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10">
                </circle>
            </svg>
            <div class="message">Loading...</div>
        </div>
    </div>
    <!-- END #loader -->

    <!-- BEGIN #app -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed app-with-wide-sidebar">

        @include('layouts.admin.header')

        @include('layouts.admin.sidebar')

        <div class="app-sidebar-bg" data-bs-theme="dark"></div>
        <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile"
                class="stretched-link"></a></div>

        <div class="toast-container position-fixed top-0 end-0 p-3">
            <!-- Toast -->
            <div id="myToast" class="toast text-white" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto" id="toastTitle">Success</strong>
                    <small>Just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" id="toastBody">
                    This is a success message.
                </div>
            </div>
        </div>
        @yield('content')


        <!-- BEGIN scroll-top-btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top"
            data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
        <!-- END scroll-top-btn -->
    </div>
    <!-- END #app -->
    @stack('scripts')

</body>

</html>