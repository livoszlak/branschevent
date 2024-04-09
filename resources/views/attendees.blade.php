@extends('layouts.app')

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
        <img src="{{ asset('pictures/arrow.svg') }}"></div>
    </div>
    <p class="h1-mobile">Deltagare på YRGOxLIA '24</p>
<div>
    @foreach ($users as $user)
    <div class="business-card" data-href="{{ route('profile.show', ['id' => $user->id]) }}">
        <div class="profile-img">
            @if($user->profile->profile_image)
            <img src="{{ asset('storage/profile_images/' . $user->profile->profile_image) }}">
            @endif
        </div>
        <div class="text-wrapper">
            <p class="company-name">{{ $user->name }}</p>
            <a class="small inner-link" href="{{ $user->profile->contact_url }}">WEBBSIDA</a>
            <a class="small inner-link" href="{{ $user->profile->contact_LinkedIn }}">LINKEDIN</a>
        </div>
    </div>
    @endforeach
</div>
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection
