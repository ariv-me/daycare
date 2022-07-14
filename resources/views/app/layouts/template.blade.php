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
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

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
    <!-- Required vendors -->
    <script src="{{ asset ('resources/sources/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset ('resources/sources/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset ('resources/sources/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset ('resources/sources/js/custom.min.js') }}"></script>
	<script src="{{ asset ('resources/sources/js/deznav-init.js') }}"></script>
	<script src="{{ asset ('resources/sources/vendor/owl-carousel/owl.carousel.js') }}"></script>
	
	<!-- Apex Chart -->
	<script src="{{ asset ('resources/sources/vendor/apexchart/apexchart.js') }}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{ asset ('resources/sources/js/dashboard/dashboard-1.js') }}"></script>
	<script>
		function assignedDoctor()
		{
		
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.assigned-doctor').owlCarousel({
				loop:false,
				margin:30,
				nav:true,
				autoplaySpeed: 3000,
				navSpeed: 3000,
				paginationSpeed: 3000,
				slideSpeed: 3000,
				smartSpeed: 3000,
				autoplay: false,
				dots: false,
				navText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:2
					},	
					767:{
						items:3
					},			
					991:{
						items:2
					},
					1200:{
						items:3
					},
					1600:{
						items:5
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				assignedDoctor();
			}, 1000); 
		});
		
	</script>
	
</body>
</html>