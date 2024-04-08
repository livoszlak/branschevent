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
    <p>
        <a href="{{ route('profile.show', ['id' => $user->id]) }}">
            {{ $user->name }}
        </a>
    </p>
    @endforeach
</div>
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection