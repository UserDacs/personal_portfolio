@extends('layouts.admin.main')

@section('content')
<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Dashboard <small></small></h1>
    <!-- END page-header -->

    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TOTAL VISITORS</h4>
                    <p>3,291,922</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-link"></i></div>
                <div class="stats-info">
                    <h4>BOUNCE RATE</h4>
                    <p>20.44%</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-orange">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>UNIQUE VISITORS</h4>
                    <p>1,291,922</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-clock"></i></div>
                <div class="stats-info">
                    <h4>AVG TIME ON SITE</h4>
                    <p>00:12:23</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- END col-3 -->
    </div>
    <!-- END row -->


</div>

<!-- BEGIN theme-panel -->
<div class="theme-panel">
    <a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i>
    </a>
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
                    data-theme-class="" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                    data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
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
                    <input type="checkbox" class="form-check-input" name="app-theme-dark-mode" id="appThemeDarkMode"
                        value="1" />
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
                    <input type="checkbox" class="form-check-input" name="app-header-inverse" id="appHeaderInverse"
                        value="1" />
                    <label class="form-check-label" for="appHeaderInverse">&nbsp;</label>
                </div>
            </div>
        </div>
        <div class="row mt-10px align-items-center">
            <div class="col-8 control-label text-body fw-bold">Sidebar Fixed</div>
            <div class="col-4 d-flex">
                <div class="form-check form-switch ms-auto mb-0">
                    <input type="checkbox" class="form-check-input" name="app-sidebar-fixed" id="appSidebarFixed"
                        value="1" checked />
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
                    <input type="checkbox" class="form-check-input" name="app-gradient-enabled" id="appGradientEnabled"
                        value="1" />
                    <label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
                </div>
            </div>
        </div>
        <!-- END theme-switch -->

    </div>
</div>
<!-- END theme-panel -->

@endsection

@push('scripts')
<!-- ================== BEGIN page-js ================== -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script src="{{asset('assets/plugins/lity/dist/lity.min.js')}}"></script>
<script src="{{asset('assets/js/demo/profile.demo.js')}}"></script>
<!-- ================== END page-js ================== -->

<!-- ================== BEGIN page-module-js ================== -->
<script type="module" src="{{asset('assets/js/demo/gallery-v2.demo.js')}}"></script>
<!-- ================== END page-js ================== -->
<script>
$('#dashboard').addClass('active');
</script>
@endpush