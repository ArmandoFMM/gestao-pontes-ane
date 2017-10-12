<!DOCTYPE html>
<html lang="pt">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>{{ config('app.name', 'FG') }} - @yield('title')</title>

  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="/img/logo-ane.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design">
    <link rel="apple-touch-icon-precomposed" href="/img/logo-ane.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="/img/logo-ane.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!--Import jQuery before any js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Materialize Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="css/style-login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   @yield('css')
</head>
<body>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h2 class="header center">Sistema de Gestão de Pontes</h2>
      <div class="row center">
        <h5 class="header col s12 light">Uma Ferramenta Lorem ipsum errsrt greawen mut taere raedm toiabsb</h5>
      </div>
    </div>
  </div>

  <div class="row container">
        @yield('content')
      </div>


  <div class="row container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Speeds up development</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

    <footer class="page-footer light-blue">
    <div class="container">
      <div class="row">

      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      &copy;2017 ANE. All Rights Reserved
      </div>
    </div>
  </footer>
  <!--  Scripts-->
  @yield('js')
  </body>
</html>