{{-- @if(Auth::user()->profile_image)
     <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->profile_image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
@endif --}}
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
    <link rel="stylesheet" href="{{ asset('build/assets/app-f_nrSDOk.css') }}">
    <title>YRGOEVENT</title>
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
    <script src="{{ asset('js/tagPoster.js') }}"></script>
</body>
</html>

