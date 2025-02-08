<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Color Admin | Login v2</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN core-css ================== -->
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/material/app.min.css') }}" rel="stylesheet" />
    <!-- ================== END core-css ================== -->



    <!-- ================== BEGIN core-js ================== -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- ================== END core-js ================== -->

    <!-- ================== BEGIN page-js ================== -->

    <!-- ================== END page-js ================== -->


</head>

<body class='pace-top'>
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
    <div id="app" class="app">
        <!-- BEGIN login -->
        <div class="login login-v2 fw-bold">
            <!-- BEGIN login-cover -->
            <div class="login-cover">
                <div class="login-cover-img"
                    style="background-image: url({{ asset('assets/img/login-bg/login-bg-17.jpg') }})"
                    data-id="login-cover-image"></div>
                <div class="login-cover-bg"></div>
            </div>
            <!-- END login-cover -->

            <!-- BEGIN login-container -->
            <div class="login-container">
                <!-- BEGIN login-header -->
                <div class="login-header">
                    <div class="brand">
                        <div class="d-flex align-items-center">
                            <span class="logo"></span> <b>Admin</b>
                        </div>

                    </div>
                    <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>
                <!-- END login-header -->

                <!-- BEGIN login-content -->
                <div class="login-content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating mb-20px">
                            <input type="text"
                                class="form-control fs-13px h-45px border-0 @error('email') is-invalid @enderror"
                                placeholder="Email Address" value="{{ old('email') }}" name="email" id="email" />
                            <label for="email"
                                class="d-flex align-items-center text-gray-600 fs-13px">{{ __('Email Address') }}</label>
                        </div>
                       
                        <div class="form-floating mb-20px">
                            <input type="password" class="form-control fs-13px h-45px border-0" placeholder="Password"
                                name="password" />
                            <label for="password"
                                class="d-flex align-items-center text-gray-600 fs-13px">{{ __('Password') }}</label>
                        </div>

                        <div class="mb-20px">
                            <button type="submit" class="btn btn-theme d-block w-100 h-45px btn-lg">Sign me in</button>
                        </div>

                        <div class="alert alert-danger alert-dismissible fade show h-100 mb-0 d-none error-alert">
                            none
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                    </form>
                </div>
                <!-- END login-content -->
            </div>
            <!-- END login-container -->
        </div>
        <!-- END login -->

        <!-- BEGIN login-bg -->
        <div class="login-bg-list clearfix">
            <div class="login-bg-list-item">
                <a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg"
                    data-img="{{ asset('assets/img/login-bg/login-bg-17.jpg') }}"
                    style="background-image: url({{ asset('assets/img/login-bg/login-bg-17.jpg') }})"></a>
            </div>
            <div class="login-bg-list-item">
                <a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg"
                    data-img="{{ asset('assets/img/login-bg/login-bg-16.jpg') }}"
                    style="background-image: url({{ asset('assets/img/login-bg/login-bg-16.jpg') }})"></a>
            </div>
            <div class="login-bg-list-item">
                <a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg"
                    data-img="{{ asset('assets/img/login-bg/login-bg-15.jpg') }}"
                    style="background-image: url({{ asset('assets/img/login-bg/login-bg-15.jpg') }})"></a>
            </div>
            <div class="login-bg-list-item">
                <a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg"
                    data-img="{{ asset('assets/img/login-bg/login-bg-14.jpg') }}"
                    style="background-image: url({{ asset('assets/img/login-bg/login-bg-14.jpg') }})"></a>
            </div>
            <div class="login-bg-list-item">
                <a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg"
                    data-img="{{ asset('assets/img/login-bg/login-bg-13.jpg') }}"
                    style="background-image: url({{ asset('assets/img/login-bg/login-bg-13.jpg') }})"></a>
            </div>
            <div class="login-bg-list-item">
                <a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg"
                    data-img="{{ asset('assets/img/login-bg/login-bg-12.jpg') }}"
                    style="background-image: url({{ asset('assets/img/login-bg/login-bg-12.jpg') }})"></a>
            </div>
        </div>
        <!-- END login-bg -->

        <!-- BEGIN theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i
                    class="fa fa-cog"></i></a>
            <div class="theme-panel-content" data-scrollbar="true" data-height="100%">
                <h5>App Settings</h5>

                <!-- BEGIN theme-list -->
                <div class="theme-list">
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-red"
                            data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-pink"
                            data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-orange"
                            data-theme-class="theme-orange" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-yellow"
                            data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-lime"
                            data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-green"
                            data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-teal"
                            data-theme-class="theme-teal" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Teal">&nbsp;</a></div>
                    <div class="theme-list-item active"><a href="javascript:;" class="theme-list-link bg-cyan"
                            data-theme-class="" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-blue"
                            data-theme-class="theme-blue" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-purple"
                            data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-indigo"
                            data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
                    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-black"
                            data-theme-class="theme-gray-600" data-toggle="theme-selector" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-container="body" data-bs-title="Black">&nbsp;</a></div>
                </div>
                <!-- END theme-list -->

                <div class="theme-panel-divider"></div>

                <div class="row mt-10px">
                    <div class="col-8 control-label text-body fw-bold">
                        <div>Dark Mode <span class="badge bg-primary ms-1 py-2px position-relative"
                                style="top: -1px;">NEW</span></div>
                        <div class="lh-14">
                            <small class="text-body opacity-50">
                                Adjust the appearance to reduce glare and give your eyes a break.
                            </small>
                        </div>
                    </div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-theme-dark-mode"
                                id="appThemeDarkMode" value="1" />
                            <label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
                        </div>
                    </div>
                </div>

                <div class="theme-panel-divider"></div>

                <!-- BEGIN theme-switch -->
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-body fw-bold">Header Fixed</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-header-fixed" id="appHeaderFixed"
                                value="1" checked />
                            <label class="form-check-label" for="appHeaderFixed">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-body fw-bold">Header Inverse</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-header-inverse"
                                id="appHeaderInverse" value="1" />
                            <label class="form-check-label" for="appHeaderInverse">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-body fw-bold">Sidebar Fixed</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-sidebar-fixed"
                                id="appSidebarFixed" value="1" checked />
                            <label class="form-check-label" for="appSidebarFixed">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-body fw-bold">Sidebar Grid</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-sidebar-grid" id="appSidebarGrid"
                                value="1" />
                            <label class="form-check-label" for="appSidebarGrid">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-10px align-items-center">
                    <div class="col-8 control-label text-body fw-bold">Gradient Enabled</div>
                    <div class="col-4 d-flex">
                        <div class="form-check form-switch ms-auto mb-0">
                            <input type="checkbox" class="form-check-input" name="app-gradient-enabled"
                                id="appGradientEnabled" value="1" />
                            <label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <!-- END theme-switch -->

            </div>
        </div>
        <!-- END theme-panel -->
        <!-- BEGIN scroll-top-btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top"
            data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>

    @error('email')
    <script>
        $('.error-alert').html('<strong>{{ $message }}</strong>');
        $('.error-alert').removeClass('d-none')

    </script>
   
    @enderror
    <!-- END #app -->
    <script>
    var handleLoginPageChangeBackground = function() {
        var toggleAttr = '[data-toggle="login-change-bg"]';
        var toggleImageAttr = '[data-id="login-cover-image"]';
        var toggleImageSrcAttr = 'data-img';
        var toggleItemClass = '.login-bg-list-item';
        var toggleActiveClass = 'active';
        var defaultImage = "{{ asset('assets/img/login-bg/login-bg-17.jpg') }}"; // Default image


        var storedImage = localStorage.getItem('loginBgImage');
        if (storedImage) {
            $(toggleImageAttr).css('background-image', 'url(' + storedImage + ')');
        } else {

            $(toggleImageAttr).css('background-image', 'url(' + defaultImage + ')');
        }

        $(document).on('click', toggleAttr, function(e) {
            e.preventDefault();

            var newImage = $(this).attr(toggleImageSrcAttr);
            $(toggleImageAttr).css('background-image', 'url(' + newImage + ')');
            console.log('Background changed to: ', newImage);

            localStorage.setItem('loginBgImage', newImage);

            $(toggleAttr).closest(toggleItemClass).removeClass(toggleActiveClass);
            $(this).closest(toggleItemClass).addClass(toggleActiveClass);
        });
    };

    var LoginV2 = function() {
        "use strict";
        return {
            // Main function to initialize the script
            init: function() {
                handleLoginPageChangeBackground();
            }
        };
    }();

    // Initialize the script on document ready
    $(document).ready(function() {
        LoginV2.init();
    });
    </script>

</body>

</html>