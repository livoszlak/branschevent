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
<div>
    @foreach ($users as $user)
    <div class="business-card" data-href="{{ route('profile.show', ['id' => $user->id]) }}">
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
