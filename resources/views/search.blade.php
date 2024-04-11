@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection

@section('header')
    {{-- specific header content --}}
    @include('layouts.header')
@endsection

@section('nav')
    {{-- specific header content --}}
    @include('layouts.nav')
@endsection

@section('content')
<main>
    <div class="arrow-wrapper">
        <a href="{{ url()->previous() }}">
            <img src="{{ asset('pictures/arrow.svg') }}">
        </a>
    </div>

    <div class="header-wrapper">
        <p class="h1-mobile">Sökresultat</p>
        </div>

    <div class="card-wrapper">
        @foreach ($users as $user)
        <a href="{{ route('profile.show', ['id' => $user->id]) }}">
        <div class="business-card">
            @if($user->profile->profile_image)
            <div class="profile-img">
                <img src="{{ asset('storage/profile_images/' . $user->profile->profile_image) }}">
            </div>
            @endif
            <div class="text-wrapper">
                <p class="company-name">{{ $user->name }}</p>
            </div>
        </div>
        </a>
        @endforeach
    </div>
    </div>
    </div>


</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection