<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type"	content="charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>{{ $title or 'Andrzej Góźdź - Zlecenia Naprawy' }}</title>

    <!-- Styles -->
    <link href="{{ url('public/css/print.css') }}" rel="stylesheet">

    @section('styles')
    @show

</head>
<body>


    @yield('content')

    
    @section('scripts')
    @show
</body>
</html>
