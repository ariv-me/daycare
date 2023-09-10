
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>{{ $app['app_nama'] }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('resources/templates3/view/assets/images/favicon.png') }}">

        <!-- jvectormap -->
        <link href="{{ asset('resources/templates3/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">

        
        <link href="{{ asset('resources/templates3/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">

        <!-- Plugins css -->
        <link href="{{ asset('resources/templates3/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/templates3/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/templates3/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/templates3/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
  

        <!-- DataTables -->
        <link href="{{ asset('resources/templates3/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/templates3/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('resources/templates3/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 

        <!-- App css -->
        <link href="{{ asset('resources/templates3/view/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/templates3/view/assets/css/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/templates3/view/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/templates3/view/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/templates3/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/templates3/view/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('resources/templates3/view/assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
        
        <link href="{{ asset('resources/templates3/plugins/jquery-toast-plugin-master/src/jquery.toast.css') }}" rel="stylesheet">  
        <link href="{{ asset('resources/templates3/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet"  type="text/css">

        <style>

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #303e67;
            line-height: 33px;
            font-size: 11px;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #5897fb;
            color: white;
            font-size: 12px;
        }

        .select2-results__option {
            padding: 5px;
            user-select: none;
        }

        .select2-results__option[aria-selected] {
            cursor: pointer;
            font-size: 12px;
        }

        .scrollspy-example {
                    position: relative;
                    height: 500px;
                    margin-top: 0.1rem;
                    overflow: auto;
        }

            .total-payment .table tbody td, .total-payment table tbody td, .shopping-cart .table tbody td, .shopping-cart table tbody td {
                padding: 8px 10px;
                border-top: 0;
                border-bottom: 1px solid #f1f5fa;
            }

            .total-payment .table thead tr th, .total-payment table thead tr th, .shopping-cart .table thead tr th, .shopping-cart table thead tr th {
                font-size: 11px;
            }

            .form-group {
                margin-bottom: 8px;
            }

            .input-group-text {
                font-size: 0.7125rem;
                background-color: #f1f5fa;
                border: 1px solid #e3ebf6;
                padding-bottom: 2px;
            }

            .col-form-label {
                padding-top: calc(0.375rem + 1px);
                padding-bottom: calc(0.375rem + 1px);
                margin-bottom: 0;
                font-size: 12px;
                line-height: 1.8;
            }

            .select2-container--default .select2-selection--single {
                border: 1px solid #e3ebf6;
                height: 32px;
                font-size: 0.7400rem;
                background-color: #fff;
            }

            .form-control {
                display: block;
                width: 100%;
                height: calc(1.8em + 0.5rem + 2px);
                padding: 0.375rem 0.75rem;
                font-size: 0.7400rem;
                font-weight: 400;
                line-height: 1.8;
                color: #303e67;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #e3ebf6;
                border-radius: 0.25rem;
                -webkit-transition: border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                transition: border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
                transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
            }

            hr {
                margin-top: 1rem;
                margin-bottom: 1rem;
                border: 0;
                border-top: 1px solid #FF9800;
            }
            
            .table td, .table th {
                font-size: 13px;
                padding: 0.3rem;
            }

            body.dark-sidenav .left-sidenav-menu li>a i {
                color: #91adfa;
            }
            .left-sidenav-menu li>a i {
                width: 25px;
                display: inline-block;
                font-size: 19px;
                opacity: 0.9;
                color: #a6aed4;
            }

            .form-control2 {
                display: block;
                width: 100%;
                height: calc(1.8em + 0.75rem + 2px);
                padding: 0.375rem 0.75rem;
                font-size: 1.8125rem;
                font-weight: 400;
                line-height: 1.8;
                color: #303e67;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #e3ebf6;
                border-radius: 0.25rem;
                -webkit-transition: border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                transition: border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
                transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
                transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
            }

            .left-sidenav .brand {
                text-align: center;
                height: 74px;
                border-bottom: 1px solid #1d273f;
                /* background: white; */
            }
            .left-sidenav .brand .logo .logo-sm {
                height: 45px;
               
            }
            .left-sidenav .brand .logo .logo-lg {
                height: 30px;
                margin-left: 2px;
                margin-right: 13px;
                display: inline-block;
            }
            /* body.dark-sidebar .left-sidebar .sidebar-user-pro {
                padding: 20px 16px;
            } */
            
            /* .mx-auto {
                margin-right: auto!important;
                margin-left: auto!important;
            }

            .position-relative {
                position: relative!important;
            }

            .thumb-md {
                height: 48px;
                width: 48px;
                font-size: 18px;
                font-weight: 700;
            }

            .rounded-circle {
                border-radius: 50%!important;
            } */

            /* body.dark-sidenav .left-sidenav {
                background-color: #03d87f;
            } */

            /* .update-msg {
                border-radius: 5px;
                padding: 20px 12px;
                margin: 50px 24px 24px;
                position: relative;
                background-color: #ffd622;
            }  */

            /* .left-sidenav .brand {
                text-align: center;
                height: 74px;
                background: #ffffff;
            }

            .left-sidenav .menu-content {
                height: 100%;
                padding-bottom: 70px;
                background: #03d87f;
            }

            .left-sidenav-menu li>a.active .menu-icon {
                color: #f8f8fc;
                fill: rgb(0 0 0 / 0%);
            }

            body.dark-sidenav .left-sidenav-menu li>a {
                color: #f8f8fc;
            }

            .left-sidenav-menu li>a {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                padding: 6px 0px;
                color: #f8f8fc;
                -webkit-transition: all 0.3s ease-out;
                transition: all 0.3s ease-out;
                font-weight: 300;
            }

            body.dark-sidenav .left-sidenav-menu li>a i {
                color: #f8f8fc;
            }

            body.dark-sidenav .left-sidenav-menu li ul li>a {
                color: #f8f8fc;
            }

            body.dark-sidenav .left-sidenav-menu li>a {
                display: block;
                padding: 7px 20px;
                color: #eceef3;
                border-left: 3px solid transparent;
                -webkit-transition: all 0.3s ease-out;
                transition: all 0.3s ease-out;
            }

            .left-sidenav-menu {
                padding-left: 0;
                margin-bottom: 0;
                padding: 0px;
            }

            body.dark-sidenav .left-sidenav-menu li>a.active {
                color: #fff;
                background-color: #ffb822;
                border-left-color: #f8f8fc;
                padding: 20;
                margin-top: -8px;
            } */


            label {
                font-weight: 600;
                color: #585e7e;
                font-size: 13px;
            }

            
        
</style>

    </head>

    <body class="dark-sidenav">
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <!-- LOGO -->
            <div class="brand">
                <a href="#" class="logo">
                    <span>
                        <img src="{{ asset('resources/templates3/view/assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="{{ asset('resources/templates3/view/assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                        <img src="{{ asset('resources/templates3/view/assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
                    </span>
                </a>
            </div>

            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>

                @include('app.layouts.menu')

            </div>
        </div>
        <!-- end left-sidenav-->
        

        <div class="page-wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">            
                <!-- Navbar -->
                

                @include('app.layouts.navbar')

                

                <!-- end navbar-->
            </div>
            <!-- Top Bar End -->

            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
            
                       
                        @yield('content')      


                

                </div><!-- container -->

                <footer class="footer text-center text-sm-left">
                    &copy; 2022 Yayasan Semen Padang <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by SISFO YSP</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        


        <!-- jQuery  -->
        <script src="{{ asset('resources/templates3/view/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/js/waves.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/js/moment/moment.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/daterangepicker/daterangepicker.js') }}"></script>

        {{-- <script src="{{ asset('resources/templates3/plugins/apex-charts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/pages/jquery.analytics_dashboard.init.js') }}"></script> --}}

        <!-- Plugins js -->
        <script src="{{ asset('resources/templates3/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/bootstrap-maxlength/bootstrap-maxlength.min.j') }}s"></script>
        <script src="{{ asset('resources/templates3/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('resources/templates3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('resources/templates3/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/datatables/buttons.colVis.min.js') }}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('resources/templates3/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/pages/jquery.datatable.init.js') }}"></script>

        <script src="{{ asset('resources/templates3/plugins/dropify/js/dropify.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/pages/jquery.form-upload.init.js') }}"></script>

        <!-- App js -->

        <script src="{{ asset('resources/templates3/plugins/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{ asset('resources/templates3/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
        <script src="{{ asset('resources/templates3/plugins/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/input-mask/jquery.inputmask.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>

        <script src="{{ asset('resources/sources/assets/js_input_mask/dist/jquery.mask') }}"></script>
        <script src="{{ asset('resources/sources/assets/js_input_mask/dist/jquery.mask.min') }}"></script>

        <!-- App js -->
        <script src="{{ asset('resources/templates3/view/assets/js/app.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/my.js')}}"></script>

		@section('js')
		@show
	
        
    </body>

</html>