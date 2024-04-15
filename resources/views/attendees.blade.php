@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/attendees.css') }}" rel="stylesheet">
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
<div class="marquee">
    <div class="marquee-content scroll">
        @foreach ($users as $user)
            <h3 class="">{{ $user->name }} </h3>
            <h3>-</h3>
        @endforeach    
    </div>
    <div class="marquee-content scroll">
        @foreach ($users as $user)
            <h3 class="">{{ $user->name }}</h3>
            <h3>-</h3>
        @endforeach
    </div>
</div>
<main>
    <div class="arrow-wrapper">
        <a href="{{ url()->previous() }}">
            <img src="{{ asset('pictures/arrow.svg') }}">
        </a>
    </div>
        <div class="header-wrapper">
            <p class="h1-mobile">Deltagare på YRGOnnect '24</p>
        </div>
            @if (session('message'))
                <div class="success" id="deleted">
                    <img src="{{ asset('pictures/icons/People.svg') }}">
                    <p class="body-1">{{ session('message') }}</p>
                </div>
            @endif
        <div class="results-search-wrapper">
            <div class="search-wrapper">
                <form action="{{ route('search') }}" method="GET">
                    @csrf
                    <div class="input-relative" id="search">
                        <img src="{{ asset('pictures/icons/search.svg') }}" class="input-icon">
                        <input id="search-input" type="text" name="search-input" placeholder="Sök på företag/namn/tag" class="body-1">
                    </div>
                </form>
            </div>
            <div class="results-wrapper">
                @foreach ($users as $user)
                    <div class="card-wrapper">
                        <a class="business-card" href="{{ route('profile.show', ['id' => $user->id]) }}">
                            @if($user->profile->profile_image)
                                <div class="profile-img" id="business-img">
                                    <img src="{{ asset('storage/profile_images/' . $user->profile->profile_image) }}" id="business-img">
                                </div>
                            @else
                                <div class="profile-img default" id="business-img">
                                    <p class="h2-desktop-bold">{{ collect(explode(' ', $user->name))->map(function($word) { return strtoupper(substr($word, 0, 1)); })->implode('') }}</p>
                                </div>
                            @endif
                    <div class="text-wrapper">
                        <p class="h3-desktop-bold">{{ $user->name }}</p>
                    </div>
                </a>
                    </div>
                @endforeach
        </div>
    </div>
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection

@section('scripts')

@endsection
