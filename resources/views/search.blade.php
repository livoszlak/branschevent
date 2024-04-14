@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/attendees.css') }}" rel="stylesheet">
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
                                <p class="h2-desktop-bold">{{ $user->name[0] }}</p>
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
    </div>


</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection