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
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email" id="email">Email</label>
        <input type="email" name="email">
        <label for="password" id="password">Lösenord</label>
        <input type="password" name="password">
        <button type="submit">Logga in</button>
    </form>
</div>

    @if ($errors->any())
    <div class="error-container">
        @foreach ($errors->all() as $error)
            <p class="error">    
            {{ $error }}
            </p>
        @endforeach
    @endif
    </div>

@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection