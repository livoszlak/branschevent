<html>
    <head>
        <title>@yield('title')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @vite('resources/js/app.js');
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    {{-- @yield('header') --}}
    <body>
        @section('')
        
        @show
 
        @yield('content')
    </body>
    {{-- @yield('footer') --}}
</html>