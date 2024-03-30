@if(Auth::user()->profile_image)
     <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->profile_image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
@endif
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <title>Document</title>
</head>
<body>
     
     <script src="{{ asset('js/tagPoster.js') }}"></script>
</body>
</html>
