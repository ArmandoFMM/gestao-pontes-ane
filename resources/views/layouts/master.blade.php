<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('titulo')</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="<?= csrf_token() ?>" />
    
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="img/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="img/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="img/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- Font Awesome Icons -->
    <script src="https://use.fontawesome.com/1f7371f056.js"></script>

    <!-- Material Design Icons -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <!--Import Google Icon Font-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!--  Compiled and minified DataTable CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" type='text/css'>
    
    <!-- Compiled and minifie d CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <!-- Custom Css -->    
    <link rel="stylesheet" href="/css/style.css" type='text/css'>


    <!--Import jQuery before any js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!--Import datatable js-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type"text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    <!--Let browser know website is optimized for mobile-->

    <link rel="shortcut icon" href="/img/favicon.png">

    
    <!-- CSS Libs -->

    <link rel="stylesheet" type="text/css" href="/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/css/toastr.min.css">
    
    @yield('css')
</head>
<body>
   <ul class="side-nav" id="mobile-demo">
    <li>
                <div class="userView">
                    <div class="background">
                        <img src="/img/login-background-4.jpg">
                    </div>
                    <a href="#!user"><img class="circle" src="/img/user-logo.png"></a>
                    <a href="#!name"><span class="white-text name">John Doe</span></a>
                    <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
                </div>
            </li>
            <li class="pesquisar">
                <nav class="white">
                <div class="nav-wrapper">
                    <form>
                        <div class="input-field">
                            <input id="search-side-nav" type="search" required>
                            <label class="label-icon" for="search-side-nav"><i class="material-icons black-text">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
                </nav>
            </li>
            <li><a href="{{url('/home')}}" class="waves-effect black-text"><i class="material-icons">home</i>Inicio</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="waves-effect black-text" href="#" ><i class="fa fa-road"></i>Pontes</a></li>
             <li>
                <div class="divider"></div>
            </li>
            <li><a class="waves-effect black-text" href="#"><i class="material-icons">add</i>Registar Despacho</a></li>
             <li>
                <div class="divider"></div>
            </li>
            <li><a class="waves-effect black-text" href="#"><i class="material-icons">work</i>Corporate</a></li
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="#" class="waves-effect black-text"><i class="material-icons">account_circle</i>Utilizadores</a></li>
             <li>
                <div class="divider"></div>
            </li>
</ul>

<ul id="dropdown-user" class="dropdown-content" style="margin-top: 65px;">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>

<div class="navbar-fixed">
    <nav class="nav  grey darken-4">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">
            <img class="responsive-img circle" src="/img/logo-ane.png">
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a class="dropdown-button" href="#!" data-activates="dropdown-user"><i class="medium material-icons left">account_circle</i>Username</a></li>
            </ul>

        </div>
    </nav>
</div>

<!-- Page Layout here -->
<div class="row">
    <div class="col s12 m4 l3 sidebar">
        <ul class="sidebar-menu z-depth-2">
            <li class="user-area">
                <div class="userView">
                    <div class="background">
                        <img class="responsive-img" style="" src="/img/ponte-ane.jpg">
                    </div>
                    <a href="#!user"><i class="material-icons large black-text">account_circle</i></a>
                    <a href="#!name"><span class="name blue-text">John Doe</span></a>
                    <a href="#!email"><span class="email blue-text">jdandturk@gmail.com</span></a>
                </div>
            </li>
            <li class="pesquisar">
                <nav class="white">
                <div class="nav-wrapper">
                    <form>
                        <div class="input-field">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
                </nav>
            </li>
            <li><a href="{{url('/home')}}" class="waves-effect black-text"><i class="material-icons">home</i>Inicio</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="waves-effect black-text" href="#" ><i class="fa fa-road fa-2x"></i>Pontes</a></li>
             <li>
                <div class="divider"></div>
            </li>
            <li><a class="waves-effect black-text" href="#"><i class="material-icons">add</i>Registar Despacho</a></li>
             <li>
                <div class="divider"></div>
            </li>
            <li><a class="waves-effect black-text" href="#"><i class="material-icons">work</i>Corporate</a></li
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="#" class="waves-effect black-text"><i class="material-icons">account_circle</i>Utilizadores</a></li>
             <li>
                <div class="divider"></div>
            </li>
        </ul>
    </div>

    <div class="col s12 m8 l9 conteudo">
        @yield('content')
    </div>
</div>

<script type="text/javascript" src="https://go-expresso-gc.herokuapp.com/js/jszip.min.js"></script>
<script type="text/javascript" src="https://go-expresso-gc.herokuapp.com/js/pdfmake.min.js"></script>
<script type="text/javascript" src="https://go-expresso-gc.herokuapp.com/js/vfs_fonts.js"></script>
<script type="text/javascript" src="https://go-expresso-gc.herokuapp.com/js/custom.js"></script>
@yield('js')

<footer class="page-footer grey darken-4">
    <div class="footer-copyright">
        <div class="container">
            © 2017 Todos os Direitos Reservados
            <a class="grey-text text-lighten-4 right" href="#!">ANE</a>
        </div>
    </div>
</footer>
 



    <!-- Javascript Libs -->
    <script type="text/javascript" src="/js/select2.full.min.js"></script>
    <script type="text/javascript" src="/js/readmore.min.js"></script>
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
    @yield('js')
</body>
</html>