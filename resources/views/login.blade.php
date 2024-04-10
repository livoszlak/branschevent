@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
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
<main class="loginMain">
    <div class="loginBanner">
        <div class="loginInfoLayout">
            <h1 class="removeMargin">Logga in</h1>
            <p class="removeMargin">Här kan du logga in på din profil för att ändra eller lägga till uppgifter</p>
        </div>
    </div>

    @if ($errors->any())
    <div class="error-container">
        @foreach ($errors->all() as $error)
            <p class="error">    
            {{ $error }}
            </p>
        @endforeach
    </div>
    @endif
    
    <div class="formWrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="loginLabelInput">
                <label for="email" id="email">Användarnamn</label>
                <div class="loginInputLayout">
                    <div class="loginInput">
                        <input type="email" name="email" placeholder="Mejladress">
                        <img src="{{asset('pictures/Communication.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="loginLabelInput">
                <label for="password" id="password">Lösenord</label>
                <div class="loginInputLayout">
                    <div class="loginInput">
                        <input type="password" name="password" placeholder="Lösenord">
                        <img src="{{asset('pictures/security.png')}}" alt="">
                    </div>
                </div>
            </div>

            <button class="submitButton" type="submit"><p>Logga in</p></button>
            <button class="newAccount"><a href="/registration">SKAPA NY ANMÄLAN</a></button>
        </form>
    </div>

@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection