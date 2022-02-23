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

		<!-- INTERNAL SINGLE-PAGE CSS -->
		<link href="{{ asset('assets/plugins/single-page/css/single-page.css') }}" rel="stylesheet" type="text/css">

		<!--- FONT-ICONS CSS -->
		<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>

	    <!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/color-skins/color11.css') }}" />

	</head>

	<body class="app sidebar-mini">

		<!-- BACKGROUND-IMAGE -->
		<div class="login-img">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="{{ asset('assets/images/svgs/loader.svg') }}" class="loader-img" alt="Loader">
			</div>

			<div class="page h-100">
				<div class="">
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						<div class="text-center">
							<img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img" alt="">
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-6">
							<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
								@csrf
								<span class="login100-form-title">
									Member Login
								</span>
								<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
									<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
                                	@enderror
								</div>
								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
                                	@enderror
								</div>

								@if (Route::has('password.request'))
									<div class="text-right pt-1 d-none">
										<p class="mb-0"><a href="{{ route('password.request') }}" class="text-primary ml-1">Forgot Password?</a></p>
									</div>
								@endif

								<div class="container-login100-form-btn">
									<button type="submit" class="login100-form-btn btn-primary">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

		<!-- JQUERY SCRIPTS JS-->
		<script src="{{ asset('assets/js/vendors/jquery-3.2.1.min.js') }}"></script>

		<!-- BOOTSTRAP SCRIPTS JS-->
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

		<!-- SPARKLINE JS-->
		<script src="{{ asset('assets/js/vendors/jquery.sparkline.min.js') }}"></script>

		<!-- CHART-CIRCLE JS-->
		<script src="{{ asset('assets/js/vendors/circle-progress.min.js') }}"></script>

		<!-- RATING STAR JS-->
		<script src="{{ asset('assets/plugins/rating/rating-stars.js') }}"></script>

		<!-- INPUT MASK JS-->
		<script src="{{ asset('assets/plugins/input-mask/input-mask.min.js') }}"></script>

		<!-- CUSTOM JS-->
		<script src="{{ asset('assets/js/custom.js') }}"></script>

	</body>
</html>
