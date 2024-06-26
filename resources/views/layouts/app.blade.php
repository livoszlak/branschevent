<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')

    <title>YRGOnnect</title>
</head>
<body>
    {{-- Include header content --}}
    @yield('header')

    {{-- Include nav content --}}
    @yield('nav')

    {{-- Body content --}}
    @yield('content')

    {{-- Include footer content --}}
    @yield('footer')

    {{-- Scripts --}}
    @yield('scripts')
{{--     <script src="{{ asset('js/tagPoster.js') }}"></script>
    <script src="{{ asset('js/buttonlistener.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script> --}}
</body>
</html>

