<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="utf-8" />
    <title>MBW ERP @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="WMS Developed by Multibarnd Infotech">
    <meta name="keywords" content="mit, wms">
    <meta name="author" content="MIT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="{{ url('app_assets') }}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('app_assets') }}/images/ico/favicon.ico">
    @include('website.includes.style')
</head>
<body>
<!-- Begin page -->
{{--<div id="layout-wrapper">--}}
    <!-- Header Start -->
{{--@include('website.includes.header')--}}
<!-- Header End -->
    <!-- ========== App Menu ========== -->
{{--@include('website.includes.sidebar')--}}
<!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
{{--    <div class="vertical-overlay"></div>--}}
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
{{--    <div class="main-content">--}}
    @yield('content')
    <!-- End Page-content -->
{{--        @include('website.includes.footer')--}}
{{--    </div>--}}
    <!-- end main content-->
{{--</div>--}}
<!-- END layout-wrapper -->
<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->
<!--preloader-->

{{-- <div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>
<div class="customizer-setting d-none d-md-block">
    <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
        <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
    </div>
</div> --}}


<!-- Theme Settings -->
{{-- @include('website.includes.offcanvas') --}}
<!-- JAVASCRIPT -->

{!! Toastr::message() !!}


@include('website.includes.script')


</body>
</html>
