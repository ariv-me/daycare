<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ERES - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset ('resources/sources/images/favicon.png') }}">
	<link href="{{ asset ('resources/sources/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset ('resources/sources/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('resources/sources/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('resources/sources/vendor/select2/css/select2.min.css') }}">
    <link href="{{ asset('resources/sources/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('resources/sources/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/sources/assets/jquery-toast-plugin-master/src/jquery.toast.css') }}" rel="stylesheet">  
    <link href="{{ asset('resources/sources/assets/sweetalert/sweetalert.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('resources/sources/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('resources/sources/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

   
    
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

<style>

    .header {
        height: 3.5rem;
    }
    .nav-header {
        height: 3.5rem;
    }
    [data-header-position="fixed"] .content-body {
        padding-top: 2.5rem;
    }

    .deznav {
        height: calc(130% - 120px);
        top: 3.5rem;
    }

    [data-sidebar-style="full"][data-layout="vertical"] .deznav .metismenu > li > a {
        font-size: 15px;
        padding: 6px 36px 26px 28px;
    } 

    .deznav .metismenu {
  
        padding-top: 23px;
        padding-right: 20px;
    }

    [data-sidebar-style="full"][data-layout="vertical"] .deznav .metismenu > li > a {
        font-size: 15px;
        padding: 14px 36px 13px 28px;
        border-radius: 0 1rem 74rem 0;
    }

    .deznav .metismenu > li a > i {
        font-size: 1.2rem;
    }

    .deznav .metismenu ul a {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        position: relative;
        font-size: 13px;
        padding-left: 4.5rem;
    }

    .content-body .container-fluid, .content-body .container-sm, .content-body .container-md, .content-body .container-lg, .content-body .container-xl {
        padding-top: 40px;
        padding-right: 21px;
        padding-left: 21px;
    }

    .card-header {

        padding: 1.5rem -13.125rem 1.25rem;

    }

    .card-body {
        padding: 1.5rem;
    }

    .form-control {
        background: #fff;
        border: 1px solid #d7dae3;
        color: #3e4954;
        height: 40.3px;
        border-radius: 0.4rem;
        font-size: 0.7rem;
    }

    .btn {
        padding: 0.6rem 1.5rem;
        border-radius: 0.4rem;
        font-weight: 500;
        font-size: 0.8rem;
    }

    .header-right .header-profile img {
        width: 44px;
        height: 44px;
        border: 2px solid #36C95F;
    }

    .header-right .nav-item .nav-link {
        color: #464a53;
        font-size: 16px;
    }

    .btn-icon-left {
        background: #fff;
        border-radius: 10rem;
        display: inline-block;
        margin: -0.5rem -0.25rem -0.5rem -1.4rem;
        padding: 0.5rem 0.8rem 0.5rem;
        float: left;
    }

    .btn-lg, .btn-group-lg > .btn {
        padding: 1rem 2rem;
        font-size: 0.8rem !important;
    }

    .dropdown-menu .dropdown-item {
        font-size: 13px;
        color: #464444;
        padding: 0.5rem 1.75rem;
    }

    .dropdown-menu .dropdown-item:hover, .dropdown-menu .dropdown-item:focus, .dropdown-menu .dropdown-item:active, .dropdown-menu .dropdown-item.active {
        color: #ffffff;
        background: #3695eb;
    }

    .modal-footer {
        padding: 0.3rem 0.875rem;
    }

    /* .card-footer {
        border-color: #d7dae3;
        background: transparent;
        padding: 1.25rem -7.125rem 1.25rem;
    } */

    .modal-body {
        padding: 1.3rem;
    }
    .modal-header {
        padding: 1rem 1.3rem;
    }
    .form-control:disabled, .form-control[readonly] {
        background: #ebe8e8;
        opacity: 1;
    }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #7e7e7e;
        font-size: small;
    }

    .table td{
        padding: 12px 30px;
        border-color: rgba(215, 218, 227, 0.5);
        border-bottom: 1px solid;
        border-top: none;
    }

    .sharp.btn-xs {
        padding: 3px;
        width: 26px;
        height: 26px;
        min-width: 61px;
        min-height: 26px;
    }

    small, .small {
        font-size: 80%;
        font-weight: 400;
        color: black;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid #ffb800;
    }
    .btn {
        padding: 0.6rem 1.5rem;
        border-radius: 0.4rem;
        font-weight: 500;
        font-size: 0.7rem;
    }

    .dropdown-menu .dropdown-item {
        font-size: 12px;
        color: #464444;
        padding: 0.5rem 1.75rem;
    }
    .card-body {
        padding: 1rem;
    }

</style>
    


</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>

        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
                @include('app.layouts.nav_header')
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            @include('app.layouts.header')
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">

				@include('app.layouts.menu')
                
				
			</div>

            <div class="copyright">
                <p class="fs-14 font-w200"><strong class="font-w400">Eres Hospital Admin Dashboard</strong> © 2020 All Rights Reserved</p>
                <p>Made with <i class="fa fa-heart"></i> by DexignZone</p>
            </div>
            
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				@yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
           @include('app.layouts.footer')
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->


    <!-- jQuery  -->
    <script src="{{ asset('resources/sources/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('resources/sources/assets/sweetalert/jquery.sweet-alert.custom.js')}}"></script>


    <script src="{{ asset ('resources/sources/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset ('resources/sources/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset ('resources/sources/js/custom.min.js') }}"></script>
	<script src="{{ asset ('resources/sources/js/deznav-init.js') }}"></script>
	<script src="{{ asset ('resources/sources/vendor/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ asset ('resources/sources/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset ('resources/sources/js/plugins-init/select2-init.js') }}"></script>
    <script src="{{ asset('resources/sources/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Jquery Validation -->
    <script src="{{ asset ('resources/sources/vendor/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Form validate init -->
    <script src="{{ asset ('resources/sources/js/plugins-init/jquery.validate-init.js') }}"></script>
    <script src="{{ asset ('resources/sources/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset ('resources/sources/js/plugins-init/sweetalert.init.js') }}"></script>

    <script src="{{ asset('resources/sources/assets/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('resources/sources/assets/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
    <script src="{{ asset('resources/sources/assets/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
    <script src="{{ asset('resources/sources/assets/plugins/moment/moment.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('resources/sources/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('resources/sources/js/plugins-init/datatables.init.js') }}."></script>
    
    @section('js')
    @show
	
</body>
</html>