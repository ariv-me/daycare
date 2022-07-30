
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dastyle - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('resources/templates3/view/assets/images/favicon.ico') }}">

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
        
        <link href="{{ asset('resources/templates3/plugins/jquery-toast-plugin-master/src/jquery.toast.css') }}" rel="stylesheet">  
        <link href="{{ asset('resources/templates3/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet"  type="text/css">

        <style>
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
        </style>

    </head>

    <body class="dark-sidenav">
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <!-- LOGO -->
            <div class="brand">
                <a href="dashboard/crm-index.html" class="logo">
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
                    &copy; 2020 Dastyle <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
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
        <script src="{{ asset('resources/templates3/view/assets/js/moment.js') }}"></script>
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
        <script src="{{ asset('resources/templates3/plugins/input-mask/jquery.inputmask.js') }}"></script>
        <script src="{{ asset('resources/templates3/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('resources/templates3/view/assets/js/app.js') }}"></script>
        <script src="{{ asset('resources/templates3/view/assets/my.js')}}"></script>

		@section('js')
		@show
	
        
    </body>

</html>