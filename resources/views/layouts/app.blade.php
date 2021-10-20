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

						<!-- PAGE-HEADER -->
						@include('layouts.page-header')
						<!-- PAGE-HEADER END -->

						<!-- CONTENT ROWS -->
						@yield('content')
						<!-- CONTENT ROWS END -->
					</div>
					<!--CONTAINER CLOSED -->
				</div>
			</div>

			<!-- Right-sidebar-->
			<div class="sidebar sidebar-right sidebar-animate">
				<div class="p-2 pr-3 mb-2 sidebar-icon">
					<a href="#" class="text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
				</div>
				<div class="tab-menu-heading siderbar-tabs border-0">
					<div class="tabs-menu ">
						<!-- Tabs -->
						<ul class="nav panel-tabs">
							<li class=""><a href="#tab1"  class="active" data-toggle="tab">Settings</a></li>
							<li><a href="#tab2" data-toggle="tab">Followers</a></li>
							<li><a href="#tab3" data-toggle="tab">Todo</a></li>
						</ul>
					</div>
				</div>
				<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
					<div class="tab-content border-top">
						<div class="tab-pane active " id="tab1">
							<div class="p-3 border-bottom">
								<h5 class="border-bottom-0 mb-0">General Settings</h5>
							</div>
							<div class="p-4">
								<div class="switch-settings">
									<div class="d-flex mb-2">
										<span class="mr-auto fs-15">Notifications</span>
										<div class="onoffswitch2">
											<input type="checkbox" name="onoffswitch2" id="onoffswitch" class="onoffswitch2-checkbox" checked>
											<label for="onoffswitch" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="d-flex mb-2">
										<span class="mr-auto fs-15">Show your emails</span>
										<div class="onoffswitch2">
											<input type="checkbox" name="onoffswitch2" id="onoffswitch1" class="onoffswitch2-checkbox">
											<label for="onoffswitch1" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="d-flex mb-2">
										<span class="mr-auto fs-15">Show Task statistics</span>
										<div class="onoffswitch2">
											<input type="checkbox" name="onoffswitch2" id="onoffswitch2" class="onoffswitch2-checkbox">
											<label for="onoffswitch2" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="d-flex mb-2">
										<span class="mr-auto fs-15">Show recent activity</span>
										<div class="onoffswitch2">
											<input type="checkbox" name="onoffswitch2" id="onoffswitch3" class="onoffswitch2-checkbox" checked>
											<label for="onoffswitch3" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="d-flex mb-2">
										<span class="mr-auto fs-15">System Logs</span>
										<div class="onoffswitch2">
											<input type="checkbox" name="onoffswitch2" id="onoffswitch4" class="onoffswitch2-checkbox" >
											<label for="onoffswitch4" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="d-flex mb-2">
										<span class="mr-auto fs-15">Error Reporting</span>
										<div class="onoffswitch2">
											<input type="checkbox" name="onoffswitch2" id="onoffswitch5" class="onoffswitch2-checkbox" >
											<label for="onoffswitch5" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="d-flex mb-2">
										<span class="mr-auto fs-15">Show your status to all</span>
										<div class="onoffswitch2">
											<input type="checkbox" name="onoffswitch2" id="onoffswitch6" class="onoffswitch2-checkbox" checked>
											<label for="onoffswitch6" class="onoffswitch2-label"></label>
										</div>
									</div>
									<div class="d-flex mb-2">
										<span class="mr-auto fs-15">Keep up to date</span>
										<div class="onoffswitch2">
											<input type="checkbox" name="onoffswitch2" id="onoffswitch7" class="onoffswitch2-checkbox">
											<label for="onoffswitch7" class="onoffswitch2-label"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="p-3 border-bottom">
								<h5 class="border-bottom-0 mb-0">Overview</h5>
							</div>
							<div class="p-4">
								<div class="progress-wrapper">
									<div class="mb-3">
										<p class="mb-2">Achieves<span class="float-right text-muted font-weight-normal">80%</span></p>
										<div class="progress h-1">
											<div class="progress-bar bg-primary w-80 " role="progressbar"></div>
										</div>
									</div>
								</div>
								<div class="progress-wrapper pt-2">
									<div class="mb-3">
										<p class="mb-2">Projects<span class="float-right text-muted font-weight-normal">60%</span></p>
										<div class="progress h-1">
											<div class="progress-bar bg-secondary w-60 " role="progressbar"></div>
										</div>
									</div>
								</div>
								<div class="progress-wrapper pt-2">
									<div class="mb-3">
										<p class="mb-2">Earnings<span class="float-right text-muted font-weight-normal">50%</span></p>
										<div class="progress h-1">
											<div class="progress-bar bg-success w-50" role="progressbar"></div>
										</div>
									</div>
								</div>
								<div class="progress-wrapper pt-2">
									<div class="mb-3">
										<p class="mb-2">Balance<span class="float-right text-muted font-weight-normal">45%</span></p>
										<div class="progress h-1">
											<div class="progress-bar bg-warning w-45 " role="progressbar"></div>
										</div>
									</div>
								</div>
								<div class="progress-wrapper pt-2">
									<div class="mb-3">
										<p class="mb-2">Toatal Profits<span class="float-right text-muted font-weight-normal">75%</span></p>
										<div class="progress h-1">
											<div class="progress-bar bg-danger w-75" role="progressbar"></div>
										</div>
									</div>
								</div>
								<div class="progress-wrapper pt-2">
									<div class="mb-3">
										<p class="mb-2">Total Likes<span class="float-right text-muted font-weight-normal">70%</span></p>
										<div class="progress h-1">
											<div class="progress-bar bg-teal w-70" role="progressbar"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab2">
							<div class="list-group-item d-flex  align-items-center border-top-0">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('assets/images/users/female/2.jpg') }}" style="background: url(&quot;{{ asset('assets/images/users/female/2.jpg') }}&quot;) center center;"></span>
								</div>
								<div class="">
									<div class="font-weight-500">Mozelle Belt</div>
									<small class="text-muted">Web Designer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm  btn-light">Follow</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('assets/images/users/female/6.jpg') }}" style="background: url(&quot;{{ asset('assets/images/users/female/6.jpg') }}&quot;) center center;"></span>
								</div>
								<div class="">
									<div class="font-weight-500">Alina Bernier</div>
									<small class="text-muted">Administrator
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm  btn-light">Follow</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('assets/images/users/male/5.jpg') }}" style="background: url(&quot;{{ asset('assets/images/users/male/5.jpg') }}&quot;) center center;"></span>
								</div>
								<div class="">
									<div class="font-weight-500">Isidro Heide</div>
									<small class="text-muted">Web Designer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm  btn-light">Follow</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('assets/images/users/male/6.jpg') }}" style="background: url(&quot;{{ asset('assets/images/users/male/6.jpg') }}&quot;) center center;"></span>
								</div>
								<div class="">
									<div class="font-weight-500">Isidro Heide</div>
									<small class="text-muted">Web Designer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm  btn-light">Follow</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('assets/images/users/male/2.jpg') }}" style="background: url(&quot;{{ asset('assets/images/users/male/2.jpg') }}&quot;) center center;"></span>
								</div>
								<div class="">
									<div class="font-weight-500">Isidro Heide</div>
									<small class="text-muted">Web Designer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm  btn-light">Follow</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('assets/images/users/male/4.jpg') }}" style="background: url(&quot;{{ asset('assets/images/users/male/2.jpg') }}&quot;) center center;"></span>
								</div>
								<div class="">
									<div class="font-weight-500">Isidro Heide</div>
									<small class="text-muted">Web Designer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm  btn-light">Follow</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('assets/images/users/male/5.jpg') }}" style="background: url(&quot;{{ asset('assets/images/users/male/2.jpg') }}&quot;) center center;"></span>
								</div>
								<div class="">
									<div class="font-weight-500">Isidro Heide</div>
									<small class="text-muted">Web Designer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm  btn-light">Follow</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('assets/images/users/male/2.jpg') }}" style="background: url(&quot;{{ asset('assets/images/users/male/2.jpg') }}&quot;) center center;"></span>
								</div>
								<div class="">
									<div class="font-weight-500">Isidro Heide</div>
									<small class="text-muted">Web Designer
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm  btn-light">Follow</a>
								</div>
							</div>
							<div class="list-group-item d-flex  align-items-center border-bottom-0">
								<div class="mr-2">
									<span class="avatar avatar-md brround cover-image" data-image-src="{{ asset('assets/images/users/female/3.jpg') }}" style="background: url(&quot;{{ asset('assets/images/users/female/3.jpg') }}&quot;) center center;"></span>
								</div>
								<div class="">
									<div class="font-weight-500">Florinda Carasco</div>
									<small class="text-muted">Project Manager
									</small>
								</div>
								<div class="ml-auto">
									<a href="#" class="btn btn-sm  btn-light">Follow</a>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab3">
							<div class="">
								<div class="d-flex p-3">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
										<span class="custom-control-label">Do Even More..</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2" checked="">
										<span class="custom-control-label">Find an idea.</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox3" value="option3" checked="">
										<span class="custom-control-label">Hangout with friends</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox4" value="option4" >
										<span class="custom-control-label">Do Something else</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox5" value="option5" >
										<span class="custom-control-label">Eat healthy, Eat Fresh..</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox6" value="option6" checked="">
										<span class="custom-control-label">Finsh something more..</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox7" value="option7" checked="">
										<span class="custom-control-label">Do something more</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox8" value="option8" >
										<span class="custom-control-label">Updated more files</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox9" value="option9" >
										<span class="custom-control-label">System updated</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox10" value="option10" >
										<span class="custom-control-label">Settings Changings...</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div><div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox9" value="option9" >
										<span class="custom-control-label">System updated</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="d-flex p-3 border-top border-bottom">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox10" value="option10" >
										<span class="custom-control-label">Settings Changings...</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title=""  data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End Rightsidebar-->

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
