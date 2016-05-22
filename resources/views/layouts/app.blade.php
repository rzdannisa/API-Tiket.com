<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>API - Tiket.com</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="{{ url('css/materialize.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/materialize.css')}}" rel="stylesheet" type="text/css" />
    <!-- Styles -->


    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
@if (Auth::guest())
<nav>
<div class="nav-wrapper">
    <a href="#!" class="brand-logo">API-Ticket.com</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="{{ url('/login') }}">Login</a></li>
    <li><a href="{{ url('/register') }}">Register</a></li>
      </ul>
  </div>
</nav>
@else

<nav>
  <div class="nav-wrapper">
    <a class="brand-logo">API-Ticket.com</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li><a href="{{ url('/master/currency') }}">Currency</a></li>
      <li><a href="{{ url('/master/country') }}">Country</a></li>
      <li><a href="{{ url('/master/language') }}">Language</a></li>
      <li><a href="{{ url('/master/airport') }}">Airport</a></li>
      <li><a href="{{ url('/airline/flight') }}">Flight</a></li>
       <li><a href="{{ url('logout') }}">Logout</a></li>
    </ul>
  </div>
</nav>
@endif

<div class="container">
  @yield('content')
</div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
