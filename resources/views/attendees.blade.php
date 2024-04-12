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
        @endforeach    
    </div>
    <div class="marquee-content scroll">
        @foreach ($users as $user)
            <h3 class="">{{ $user->name }}</h3>
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
    <p class="h1-mobile">Deltagare på YRGOxLIA '24</p>
    </div>
    <div class="search-wrapper">
        <form action="{{ route('search') }}" method="GET">
            @csrf
            <input type="text" name="search-input" placeholder="Sök på företag/namn/tag">
        </form>
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
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection

@section('scripts')

@endsection
