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

    <div class="card-wrapper">
        @foreach ($profiles as $profile)
        <a href="{{ route('profile.show', ['id' => $profile->id]) }}">
        <div class="business-card">
            @if($profile->profile_image)
            <div class="profile-img">
                <img src="{{ asset('storage/profile_images/' . $profile->profile_image) }}">
            </div>
            @endif
            <div class="text-wrapper">
                <p class="company-name">{{ $profile->user->name }}</p>
            </div>
        </div>
        </a>
        @endforeach
    </div>
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection