<!DOCTYPE html>
<html>

<head>
    <title>@yield('titulo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= csrf_token() ?>" />
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" type="text/css" href="/js/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="/js/datetimepicker/bootstrap-datetimepicker.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/themes/flat-blue.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/logo-icon.png" type="image/x-icon">
    <!-- CSS Fonts -->
    <link rel="stylesheet" href="/fonts/voyager/styles.css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/vue.min.js"></script>
    @yield('css')
    <!-- Voyager CSS -->
    <link rel="stylesheet" href="/css/voyager.css"> @yield('head')
</head>

<body class="flat-blue">
    <div id="voyager-loader">
        <img src="/img/logo-icon.png" alt="Voyager Loader">
    </div>
    <div class="app-container">
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <div class="hamburger">
                            <span class="hamburger-inner"></span>
                        </div>
                        <ol class="breadcrumb">
                            <li class="active"><i class="voyager-boat"></i> Dashboard</li>
                            <li class="active">
                                <a href="#"><i class="voyager-boat"></i> Dashboard</a>
                            </li>
                        </ol>
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                        <i class="voyager-list icon"></i>
                    </button>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                        <i class="voyager-x icon"></i>
                    </button>
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="img/captain-avatar.png" class="profile-img"> <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-animated">
                                <li class="profile-img">
                                    <img src="img/captain-avatar.png" class="profile-img">
                                    <div class="profile-body">
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#"><i class="voyager-person"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="#"><i class="voyager-power"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="">
                                <div class="logo-icon-container">
                                    <img src="/images/logo-icon-light.png" alt="Logo Icon">
                                </div>
                                <div class="title"> SGP - ANE</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                            <i class="voyager-x icon"></i>
                        </button>
                        </div>
                        <!-- .navbar-header -->
                        <div class="panel widget center bgimage" style="background-image:url('/img/bg.jpg' ) }});">
                            <div class="dimmer"></div>
                            <div class="panel-content">
                                <img src="img/captain-avatar.png" class="avatar" alt="avatar">
                                <a href="#" class="btn btn-primary">Profile</a>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                        <!-- TODO -->
                        <!-- Colocar a Ul aqui -->
                </nav>
                </div>
                <!-- Main Content -->
                <div class="container-fluid">
                    <div class="side-body padding-top">
                        @yield('page_header') @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="app-footer">
        <div class="site-footer-right">
            <!-- TODO -->
            <!-- Colocar texto do aqui footer -->
            <i class="voyager-rum-1"></i> Made with rum and even more rum
        </div>
    </footer>
    <!-- Javascript Libs -->
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-switch.min.js"></script>
    <script type="text/javascript" src="/js/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/select2.full.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <!-- Javascript -->
    <script type="text/javascript" src="/js/readmore.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    @yield('javascript')
</body>

</html>