<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Meta data -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
        <meta content="Dashmint – Bootstrap Responsive Flat Admin Dashboard HTML5 Template" name="description" />
        <meta content="Spruko Technologies Private Limited" name="author" />
        <meta
            name="keywords"
            content="admin bootstrap 4 template, admin dashboard, admin dashboard template, admin panel html template, admin panel template, bootstrap 4 dashboard, modern admin template, bootstrap admin dashboard, bootstrap admin dashboard template, bootstrap admin template, bootstrap dashboard, bootstrap dashboard template, bootstrap simple dashboard, dashboard bootstrap 4, dashboard html css, dashboard template bootstrap 4, bootstrap control panel, template bootstrap 4 admin, simple bootstrap admin template, simple dashboard html template, simple dashboard template bootstrap"
        />

        <!--favicon -->
        <link rel="icon" href="http://face-attendance.test/assets/images/brand/favicon.ico" type="image/x-icon" />

        <!-- TITLE -->
        <title>Dashmint – Bootstrap Responsive Flat Admin Dashboard HTML5 Template.</title>

        <!-- BOOTSTRAP CSS -->
        <link href="http://face-attendance.test/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

        <!-- DASHBOARD CSS -->
        <link href="http://face-attendance.test/assets/css/style.css" rel="stylesheet" />
        <link href="http://face-attendance.test/assets/css/skins-modes.css" rel="stylesheet" />

        <!--SIDEMENU CSS-->
        <link rel="stylesheet" href="http://face-attendance.test/assets/css/closed-sidemenu.css" />

        <!--C3 CHARTS CSS -->
        <link href="http://face-attendance.test/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

        <!--- FONT-ICONS CSS -->
        <link href="http://face-attendance.test/assets/css/icons.css" rel="stylesheet" />

        <!-- INTERNAL SELECT2 CSS -->
        <link href="http://face-attendance.test/assets/plugins/select2/select2.min.css" rel="stylesheet" />

        <!-- SIDEBAR CSS -->
        <link href="http://face-attendance.test/assets/plugins/right-sidebar/right-sidebar.css" rel="stylesheet" />

        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="http://face-attendance.test/assets/css/color-skins/color11.css" />
    </head>

    <body class="app sidebar-mini" style="background: radial-gradient(black, transparent);">
        <div id="particles-js" class="zindex1"></div>
        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="http://face-attendance.test/assets/images/svgs/loader.svg" class="loader-img" alt="Loader" />
        </div>

        <div class="page">
            <div class="page-main">
                <!-- CONTAINER -->
                <div class="app-content" style="margin-left: 0;">
                    <div class="section">
                        <!-- CONTENT ROWS -->
                        <div class="row">
                            <img style="display: block;position: fixed; top: 45%;left: 50%;" src="{{ asset('assets/images/brand/logo.png') }}" alt="" class="userpicimg" />
                        </div>

                        <div class="row" id="single-row" style="display: none;">
                            <div class="col-md-4 offset-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="userprofile">
                                                <h1 id="in-or-out"></h1>
                                                <div class="userpic brround" style="height: 200px;width: 200px;"><img id="user-photo" style="height: 200px;width: 200px;" src="{{ asset('assets/images/users/female/7.jpg') }}" alt="" class="userpicimg" /></div>
                                                <h3 id="user-name" class="username text-dark mb-2">User Name</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CONTENT ROWS END -->
                    </div>
                    <!--CONTAINER CLOSED -->
                </div>
            </div>
        </div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- JQUERY SCRIPTS -->
        <script src="http://face-attendance.test/assets/js/vendors/jquery-3.2.1.min.js"></script>

        <!-- BOOTSTRAP SCRIPTS -->
        <script src="http://face-attendance.test/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- SPARKLINE -->
        <script src="http://face-attendance.test/assets/js/vendors/jquery.sparkline.min.js"></script>

        <!-- CHART-CIRCLE -->
        <script src="http://face-attendance.test/assets/js/vendors/circle-progress.min.js"></script>

        <!-- PARTICLES JS-->
		<script src="{{ asset('assets/plugins/particles.js-master/particles.js') }}"></script>
		<script src="{{ asset('assets/plugins/particles.js-master/particlesapp_bubble.js') }}"></script>

        <!-- RATING STAR -->
        <script src="http://face-attendance.test/assets/plugins/rating/rating-stars.js"></script>

        <!-- INPUT MASK JS-->
        <script src="http://face-attendance.test/assets/plugins/input-mask/input-mask.min.js"></script>

        <!-- INTERNAL SELECT2 JS -->
        <script src="http://face-attendance.test/assets/plugins/select2/select2.full.min.js"></script>
        <script src="http://face-attendance.test/assets/js/select2.js"></script>

        <!-- CHART JS  -->
        <script src="http://face-attendance.test/assets/plugins/chart/chart.bundle.js"></script>
        <script src="http://face-attendance.test/assets/plugins/chart/utils.js"></script>

        <!-- SIDEBAR JS -->
        <script src="http://face-attendance.test/assets/plugins/right-sidebar/right-sidebar.js"></script>

        <!-- CUSTOM JS-->
        <script src="http://face-attendance.test/assets/js/custom.js"></script>

        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script>
            $(document).ready(function() {
                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = true;

                var pusher = new Pusher('75287724235b53d5f543', {
                    authEndpoint: '{{ url("/broadcasting/auth") }}',
                    auth: {
                        headers: {
                            Accept: "application/json",
                            Authorization: "Bearer {{ auth()->user()->company->token }}"
                        }
                    },
                    cluster: 'ap1'
                });

                var channel = pusher.subscribe('private-company-monitor.{{ auth()->user()->company_id }}');
                channel.bind('show.attendance', function(data) {
                    $('#in-or-out').html(data.camera);
                    $('#user-photo').attr('src', data.photo);
                    $('#user-name').html(data.name);
                    $('#single-row').fadeIn('slow');
                    setTimeout(() => {
                        $('#single-row').fadeOut('slow');
                    }, 3000);
                });
            });
        </script>
    </body>
</html>
