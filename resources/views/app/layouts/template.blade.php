
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
        <link href="{{ asset('resources/templates3/plugins/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
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

            .form-control:disabled, .form-control[readonly] {
                background-color: #eeeeee;
                opacity: 1;
            }

            .table th {
                color: #303e67;
                font-weight: 500;
                padding: 6px;
                vertical-align: middle;
            }

            .table td {
                vertical-align: middle;
                padding: 7px;
                font-size: 12px;
            }

            .scrollspy-example {
                position: relative;
                height: 325px;
                margin-top: 0.1rem;
                overflow: auto;
            }
            .modal-header {
                padding: 0.5rem 0.5rem 0.5rem 1rem;
            }

            .form-group {
                margin-bottom: 2px;
            }

            label {
                font-weight: 500;
                color: #6c757d;
                font-size: 13px;
            }

            .card-header:first-child {
                border-radius: calc(0rem - 1px) calc(0rem - 1px) 0 0;
            }

            .red {
                color:#ff0002;
            }

            code {
                color: #ff0002;
                font-size: 13px;
            }

            .col-form-label {
                padding-top: calc(0.375rem + 1px);
                padding-bottom: calc(0.375rem + 1px);
                margin-bottom: 0;
                font-size: 12px;
                line-height: 1.8;
                color: #322e2e;
            }

            .geser_kanan {
                text-align: right;
                font-size: 18px;
            }

            hr.hr-dashed {
                margin-top: 0rem;
                margin-bottom: 1rem;
                border: 0;
                border-top: 1px dashed #eceff5;
                -webkit-box-sizing: content-box;
                box-sizing: content-box;
                height: 0;
                overflow: visible;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 26px;
                position: absolute;
                top: 2px;
                right: 1px;
                width: 20px;
            }

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
                border-radius: 0.23rem;
                padding: 0.5rem 0.5rem;
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
           
            label {
                font-weight: 600;
                color: #404350;
                font-size: 13px;
            }

            
        
        </style>

        @section('css')   
        @show    

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


                

             
                <footer class="footer text-center text-sm-left">
                    &copy; 2022 Yayasan Semen Padang <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by SISFO YSP</span>
                </footer><!--end footer-->
            
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
        <script src="{{ asset('resources/templates3/view/assets/pages/jquery.form-wizard.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('resources/templates3/view/assets/js/app.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/my.js')}}"></script>

		@section('js')
		@show
	
        
    </body>

</html>