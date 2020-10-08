<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>{{ config('app.name', 'Laravel Blog') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
</head>

<body>
    @include('layouts.header')

     <main role="main" class="container">
        <div class="row">

            @yield('content')

            @section('sidebar')
                @include('layouts.sidebar')
            @show

        </div><!-- /.row -->

    </main><!-- /.container -->

    @include('layouts.footer')
    
 <!-- Container for the Table of content -->
 <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
    <div class="mdl-card__supporting-text mdl-color-text--grey-600">
      <!-- div to display the generated Instance ID token -->
      <div id="token_div" style="display: none;">
        <h4>Instance ID Token</h4>
        <p id="token" style="word-break: break-all;"></p>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"
                onclick="deleteToken()">Delete Token</button>
      </div>
      <!-- div to display the UI to allow the request for permission to
           notify the user. This is shown if the app has not yet been
           granted permission to notify. -->
      <div id="permission_div" style="display: none;">
        <h4>Needs Permission</h4>
        <p id="token"></p>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"
                onclick="requestPermission()">Request Permission</button>
      </div>
      <!-- div to display messages received by this app. -->
      <div id="messages"></div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    @if (Session::has('notify'))
        @include('layouts.notification')
    @endif
</body>

</html>
