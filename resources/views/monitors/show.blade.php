<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta content="Dashmint – Bootstrap Responsive Flat Admin Dashboard HTML5 Template" name="description" />
    <meta content="Spruko Technologies Private Limited" name="author" />
    <meta name="keywords"
        content="admin bootstrap 4 template, admin dashboard, admin dashboard template, admin panel html template, admin panel template, bootstrap 4 dashboard, modern admin template, bootstrap admin dashboard, bootstrap admin dashboard template, bootstrap admin template, bootstrap dashboard, bootstrap dashboard template, bootstrap simple dashboard, dashboard bootstrap 4, dashboard html css, dashboard template bootstrap 4, bootstrap control panel, template bootstrap 4 admin, simple bootstrap admin template, simple dashboard html template, simple dashboard template bootstrap" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon" />

    <!-- TITLE -->
    <title>Dashmint – Bootstrap Responsive Flat Admin Dashboard HTML5 Template.</title>

    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- DASHBOARD CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/skins-modes.css') }}" rel="stylesheet" />

    <!--SIDEMENU CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/closed-sidemenu.css') }}" />

    <!--C3 CHARTS CSS -->
    <link href="{{ asset('assets/plugins/charts-c3/c3-chart.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- INTERNAL SELECT2 CSS -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- SIDEBAR CSS -->
    <link href="{{ asset('assets/plugins/right-sidebar/right-sidebar.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/css/color-skins/color11.css') }}" />
    <style>
        .fullscreen-bg {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            z-index: -100;
        }

        .fullscreen-bg__video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        #clock {
            float: left;
            color: #fff;
        }

        .marquee {
            line-height: 10px;
            background: rgb(27, 107, 166);
            background: linear-gradient(90deg, rgba(27, 107, 166, 1) 16%, rgba(27, 166, 127, 0.7455357142857143) 54%, rgba(26, 164, 127, 1) 100%, rgba(0, 63, 124, 0.8911939775910365) 100%);
            color: white;
            white-space: nowrap;
            overflow: hidden;
            box-sizing: border-box;
        }

        .marquee p {
            display: inline-block;
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            padding-top: 17px;
            padding-left: 100%;
            animation: marquee 15s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-100%, 0);
            }
        }

    </style>
</head>

<body class="app sidebar-mini overflow-hidden">
    <div class="fullscreen-bg">
        <video loop muted autoplay class="fullscreen-bg_video">
            <source src="{{ asset('video/screen_background.mp4') }}" type="video/mp4">
        </video>
        <audio id="audio" src="{{ asset('audio/welcome.mp3') }}"></audio>
    </div>

    <div class="page">
        <div class="page-main">
            <!-- CONTAINER -->
            <div class="app-content" style="margin-left: 0;">
                <div class="section">
                    <!-- CONTENT ROWS -->

                    <div class="row">
                        <div class="overflow-hidden" style="position: fixed;top: 5px;">
                            <h1 class="sound" style="display: inline-block;">
                                <span class="fe fe-volume-x"></span>
                                <span class="fe fe-volume-2" style="display: none;"></span>
                            </h1>
                            <div id="inHistory" style="display: inline-block;"></div>
                        </div>

                        <img style="display: block;position: fixed; top: 45%;left: 45%;"
                            src="{{ asset($user->company->logo) }}" alt="" class="userpicimg">

                        <div class="overflow-hidden" style="position: fixed;bottom: 0;width: 100%;">
                            <h1 id="clock"></h1>
                            <div id="outHistory" class="marquee" style="float: right;width: 85%;">
                                <p id="checkP">-</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="row single-row" style="display: none;justify-content: center;">
                        {{--  --}}
                    </div>
                    <!-- CONTENT ROWS END -->
                </div>
                <!--CONTAINER CLOSED -->
            </div>
        </div>
    </div>

    <!-- JQUERY SCRIPTS -->
    <script src="{{ asset('assets/js/vendors/jquery-3.2.1.min.js') }}"></script>

    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- MOMENT JS -->
    <script src="{{ asset('assets/plugins/countdown/moment.min.js') }}"></script>

    <script src="{{ asset('/js/app.js') }}"></script>
    <script>
        var playSound = false;
        var checkText = '';
        var animationDuration = 15;
        
        Echo.connector.pusher.config.auth.headers['Authorization'] = "Bearer {{ $user->company->token }}";
        Echo.channel('private-company-monitor.{{ $user->company_id }}')
            .listen('.show.attendance', (data) => {
                let users = data.users;
                let html = '';
                for (let i = 0; i < users.length; i++) {
                    html +=
                        '<div class="col-md-4"> <div class="card"> <div class="card-body"> <div class="text-center"> <div class="userprofile"> <div class="userpic brround" style="height: 200px;width: 200px;"><img style="height: 200px;width: 200px;" src="' +
                        users[i].photo +
                        '" alt="" class="userpicimg user-photo"></div><h3 style="color: #000;">' + users[i]
                        .name + '</h3><h4 style="color: #000;">' + users[i].designation + '</h4>';
                    if (users[i].eid)
                        html += '<h3 style="color: #000;">ID: ' + users[i].eid + '</h3>';
                    html += '</div></div></div></div></div>';

                    if (data.camera == 'In') {
                        checkText += 'Check In: ' + users[i].name + ', ';
                    } else {
                        checkText += 'Check Out: ' + users[i].name + ', ';
                    }
                }

                animationDuration += (users.length * 5);
                $('#checkP').css('animation', 'marquee ' + animationDuration + 's linear infinite');
                $('#checkP').html(checkText);
                if (playSound)
                    $('#audio')[0].play();

                $('.single-row').html(html).fadeIn('slow');
                setTimeout(() => {
                    $('.single-row').fadeOut('slow');
                }, 3000);
            });
    </script>

    <script>
        $(document).ready(function() {
            function startTime() {
                let now = new Date();
                document.getElementById('clock').innerHTML = moment(now).format('hh:mm A');
                setTimeout(startTime, 5000);
            }

            startTime();

            $(document).on('click', '.sound', function() {
                playSound = !playSound;
                $('.sound .fe-volume-x').toggle();
                $('.sound .fe-volume-2').toggle();

                if (playSound)
                    $('#audio')[0].play();
            });
        });
    </script>
</body>

</html>
