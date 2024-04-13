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
        <div class="informational-banner" id="info-login">
            <p class="h2-mobile-bold">Logga in</p>
            <p class="body-2">Här kan du logga in på din profil för att ändra eller lägga till uppgifter</p>
        </div>

        @if ($errors->any())
        <div class="errors" id="login-error">
            <img src="{{ asset('pictures/icons/warning.svg') }}">
            @foreach ($errors->all() as $error)
                <p class="error body-2">    
                    {{ $error }}
                </p>
            @endforeach
        </div>
        @endif
    
            <div class="formWrapper">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group">
                        <label for="email" class="body-1" id="email">Användarnamn</label>
                        <div class="input-relative">
                            <input id="email" type="email" name="email" placeholder="Mejladress" class="body-2">
                            <img src="{{ asset('pictures/Communication.png') }}" class="input-icon">
                        </div>
                    </div>

                    <div class="loginLabelInput">
                        <label for="password" class="body-1" id="password">Lösenord</label>
                        <div class="loginInputLayout">
                            <div class="loginInput">
                                <input type="password" name="password" placeholder="Lösenord" class="body-2">
                                <img src="{{asset('pictures/icons/security.svg')}}" alt="">
                            </div>
                        </div>
                    </div>

                    
                        <button class="btn btn-m primary" type="submit"><p class="button-large">Logga in</p></button>
                    </form>
                </div>
                <button class="btn btn-m secondary"><a class="button-large" href="{{ route('registration') }}">SKAPA NY ANMÄLAN</a></button>
            
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection