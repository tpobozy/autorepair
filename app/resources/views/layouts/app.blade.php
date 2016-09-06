<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Andrzej Góźdź - Zlecenia Naprawy</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">


    <link href="{{ url('public/css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    @section('styles')
    @show

</head>
<body >
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

<!--                 Branding Image
                <a class="navbar-brand" href="{{ url('/') }}">
                    Home
                </a>-->
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (Auth::check())
                    <ul class="nav navbar-nav nav-menu">
                        <li><a href="{{ url('/') }}">Zlecenia</a></li>
                        <li><a href="{{ url('reports') }}">Raporty</a></li>
                        <li><a href="{{ url('employees') }}">Pracownicy</a></li>
                    </ul>

                    <div class="nav-actions">
                        <a class="btn btn-sm btn-success" href="{{ route('orders.create') }}">
                            <i class="fa fa-plus" ></i> nowe zlecenie
                        </a>
                        <a class="btn btn-sm btn-warning" href="{{ route('orders.template') }}" target="_blank">
                            <i class="fa fa-print" ></i> puste zlecenie
                        </a>
                    </div>
                @endif


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <?php /* <li><a href="{{ url('/register') }}">Register</a></li> */ ?>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ url('public/js/jquery-2.2.3.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @section('scripts')
    @show
</body>
</html>
