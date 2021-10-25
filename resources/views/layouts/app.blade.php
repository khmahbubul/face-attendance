<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Dashmint – Bootstrap Responsive Flat Admin Dashboard HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="admin bootstrap 4 template, admin dashboard, admin dashboard template, admin panel html template, admin panel template, bootstrap 4 dashboard, modern admin template, bootstrap admin dashboard, bootstrap admin dashboard template, bootstrap admin template, bootstrap dashboard, bootstrap dashboard template, bootstrap simple dashboard, dashboard bootstrap 4, dashboard html css, dashboard template bootstrap 4, bootstrap control panel, template bootstrap 4 admin, simple bootstrap admin template, simple dashboard html template, simple dashboard template bootstrap"/>

		<!--favicon -->
		<link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon"/>

		<!-- TITLE -->
		<title>Dashmint – Bootstrap Responsive Flat Admin Dashboard HTML5 Template.</title>

		<!-- BOOTSTRAP CSS -->
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- DASHBOARD CSS -->
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/skins-modes.css') }}" rel="stylesheet"/>

		<!--SIDEMENU CSS-->
		<link rel="stylesheet" href="{{ asset('assets/css/closed-sidemenu.css') }}">

		<!--C3 CHARTS CSS -->
		<link href="{{ asset('assets/plugins/charts-c3/c3-chart.css') }}" rel="stylesheet"/>

		<!-- P-SCROll CSS -->
		<link href="{{ asset('assets/plugins/p-scroll/p-scroll.css') }}" rel="stylesheet" type="text/css">

		<!--- FONT-ICONS CSS -->
		<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>

		<!-- INTERNAL SELECT2 CSS -->
		<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>

		<!-- SIDEBAR CSS -->
		<link href="{{ asset('assets/plugins/right-sidebar/right-sidebar.css') }}" rel="stylesheet">

	    <!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/color-skins/color11.css') }}" />

        @stack('header')
	</head>

	<body class="app sidebar-mini">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{ asset('assets/images/svgs/loader.svg') }}" class="loader-img" alt="Loader">
		</div>

		<div class="page">
			<div class="page-main">
				<!-- HEADER -->
				@include('layouts.header')
				<!-- HEADER END -->

				<!-- APP SIDEBAR -->
				@include('layouts.sidebar')
				<!-- APP SIDEBAR CLOSED -->

				<!-- CONTAINER -->
				<div class="app-content">
					<div class="section">
						<!-- CONTENT ROWS -->
						@yield('content')
						<!-- CONTENT ROWS END -->
					</div>
					<!--CONTAINER CLOSED -->
				</div>
			</div>

			<!-- FOOTER -->
			<footer class="footer left-footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 text-center">
							Copyright © 2020 <a href="#">Dashmint</a>. Designed by <a href="https://spruko.com/">Spruko Technologies Pvt.Ltd</a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- FOOTER CLOSED -->
		</div>

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

		<!-- JQUERY SCRIPTS -->
		<script src="{{ asset('assets/js/vendors/jquery-3.2.1.min.js') }}"></script>

		<!-- BOOTSTRAP SCRIPTS -->
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

		<!-- SPARKLINE -->
		<script src="{{ asset('assets/js/vendors/jquery.sparkline.min.js') }}"></script>

		<!-- CHART-CIRCLE -->
		<script src="{{ asset('assets/js/vendors/circle-progress.min.js') }}"></script>

		<!-- PARTICLES JS-->
		<script src="{{ asset('assets/plugins/particles.js-master/particles.js') }}"></script>
		<script src="{{ asset('assets/plugins/particles.js-master/particlesapp_bubble.js') }}"></script>

		<!-- RATING STAR -->
		<script src="{{ asset('assets/plugins/rating/rating-stars.js') }}"></script>

		<!-- INPUT MASK JS-->
		<script src="{{ asset('assets/plugins/input-mask/input-mask.min.js') }}"></script>

        <!-- P-SCROLL JS -->
		<script src="{{ asset('assets/plugins/p-scroll/p-scroll.js') }}"></script>
		<script src="{{ asset('assets/plugins/p-scroll/p-scroll-1.js') }}"></script>

		<!-- INTERNAL SELECT2 JS -->
		<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
		<script src="{{ asset('assets/js/select2.js') }}"></script>

		<!--SIDEMENU JS-->
		<script src="{{ asset('assets/plugins/sidemenu/icon-sidemenu.js') }}"></script>

		<!-- CHART JS  -->
		<script src="{{ asset('assets/plugins/chart/chart.bundle.js') }}"></script>
		<script src="{{ asset('assets/plugins/chart/utils.js') }}"></script>

		<!-- SIDEBAR JS -->
		<script src="{{ asset('assets/plugins/right-sidebar/right-sidebar.js') }}"></script>

		<!-- CUSTOM JS-->
		<script src="{{ asset('assets/js/custom.js') }}"></script>

        @stack('footer')
    </body>
</html>
