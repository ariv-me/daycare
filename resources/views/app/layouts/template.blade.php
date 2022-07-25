<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset ('resources/templates/images/favicon.ico') }}">

    <title>EduAdmin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('resources/templates/main/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('resources/templates/main/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('resources/templates/main/css/skin_color.css') }}">
	<!-- DataTables -->
	{{-- <link href="{{ asset('resources/templates/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('resources/templates/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Responsive datatable examples -->
	<link href="{{ asset('resources/templates/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  --}}
    
	<style>
		.main-header .navbar {
			-moz-transition: margin-left 0.3s ease-in-out;
			-o-transition: margin-left 0.3s ease-in-out;
			-webkit-transition: margin-left 0.3s ease-in-out;
			transition: margin-left 0.3s ease-in-out;
			margin-bottom: 0;
			margin-left: 270px;
			min-height: 80px;
			border-radius: 0;
			border-bottom: 0px solid rgba(72, 94, 144, 0.16);
			padding: 0 1.5rem;
			box-shadow: none;
			background: #ffffff;
		}
		.box-header .box-title {
			display: inline-block;
			margin: 0;
			font-weight: 400;
			font-size: 15px;
		}
		.form-group label {
			font-weight: 500;
			font-size: 12px;
		}
		.form-label {
			margin-bottom: 0.3rem;
		}
		
		body {
			margin: 0;
			font-family: var(--bs-font-sans-serif);
			font-size: 0.9rem;
			font-weight: 500;
			line-height: 1.5;
			color: #212529;
			background-color: #fff;
			-webkit-text-size-adjust: 100%;
			-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
		}
		.sidebar-menu li.header {
			padding: 15px 25px 15px 25px;
			font-size: 12px;
			font-weight: 500;
			color: #04a08b;
			opacity: 0.5;
			text-transform: uppercase;
		}

		.box-header {
			color: #172b4c;
			display: block;
			padding: 0.6rem;
			position: relative;
			border-bottom: 1px solid rgba(72, 94, 144, 0.16);
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}
		.box-footer {
			border-top: 1px solid rgba(0, 0, 0, 0.07);
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
			padding-top: 0.4rem;
			padding-bottom: 0.4rem;
			padding-left: 1.4rem;
			padding-right: 1.4rem;
		}
		.box-body-bayar {
			-ms-flex: 1 1 auto;
			padding-top: 0.4rem;
			padding-bottom: 0.4rem;
			padding-left: 1.4rem;
			padding-right: 1.4rem;
			flex: 1 1 auto;
			border-radius: 10px;
		}

		.box-body-bayar2 {
			padding-top: 1.5rem;
			padding-bottom: 3rem;
			padding-left: 1.5rem;
			padding-right: 1.5rem;
			-ms-flex: 1 1 auto;
			flex: 1 1 auto;
			border-radius: 10px;
		}
		.geser {
			margin-top: 23px !important;
		}
	</style>
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
		</a>	
		<!-- Logo -->
		<a href="index.html" class="logo">
		  <!-- logo-->
		  <div class="logo-lg">
			  <span class="light-logo"><img src="{{ asset('resources/templates/images/logo-dark-text.png') }}" alt="logo"></span>
			  <span class="dark-logo"><img src="{{ asset('resources/templates/images/logo-light-text.png') }}" alt="logo"></span>
		  </div>
		</a>	
	</div>  


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">

		@include('app.layouts.nav_header')
      	<!-- Sidebar toggle button-->
	 
    </nav>
  </header>
  
  <aside class="main-sidebar">
    
    <!-- sidebar-->
    <section class="sidebar position-relative">	
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">	

			  <!-- sidebar menu-->

			  @include('app.layouts.menu')

			 
		  </div>
		</div>
    </section>
	<div class="sidebar-footer">
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
		<a href="mailbox.html" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
	</div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			@yield('content')
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
	@include('app.layouts.footer')
    
  </footer>
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
		
	
	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="{{ asset('resources/templates/main/js/vendors.min.js') }}"></script>
    <script src="{{ asset('resources/templates/assets/icons/feather-icons/feather.min.js') }}"></script>
	{{-- <script src="{{ asset('resources/templates/assets/vendor_components/datatable/datatables.min.js') }}"></script> --}}
	<script src="{{ asset('resources/templates/assets/vendor_components/formatter/jquery.formatter.js') }}"></script>	
	<script src="{{ asset('resources/templates/assets/vendor_components/Flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_components/Flot/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_components/Flot/jquery.flot.categories.js') }}"></script>	


	<script src="{{ asset('resources/templates/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_components/moment/min/moment.min.js') }}"></script>
	{{-- <script src="{{ asset('resources/templates/assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script> --}}
	
	<!-- EduAdmin App -->
	<script src="{{ asset('resources/templates/main/js/template.js') }}"></script>
	<script src="{{ asset('resources/templates/main/js/pages/dashboard.js') }}"></script>

	<script src="{{ asset('resources/templates/assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_plugins/input-mask/jquery.inputmask.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>

	<script src="{{ asset('resources/templates/main/js/pages/chat-popup.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/icons/feather-icons/feather.min.js') }}"></script>	
	<script src="{{ asset('resources/templates/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
	<script src="{{ asset('resources/templates/main/js/pages/toastr.js') }}"></script>
    <script src="{{ asset('resources/templates/main/js/pages/notification.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('resources/templates/assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
	
	<script src="{{ asset('resources/templates/assets/vendor_plugins/input-mask/jquery.inputmask.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

	{{-- <!-- Required datatable js -->
	<script src="{{ asset('resources/templates/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

	<script src="{{ asset('resources/templates/assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/pages/jquery.responsive-table.init.js') }}"></script>

	<!-- Buttons examples -->
	<script src="{{ asset('resources/templates/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/plugins/datatables/jszip.min.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/plugins/datatables/pdfmake.min.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/plugins/datatables/vfs_fonts.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/plugins/datatables/buttons.print.min.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
	<!-- Responsive examples -->
	<script src="{{ asset('resources/templates/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('resources/templates/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script> --}}
	
    @section('js')
    @show

</body>
</html>
