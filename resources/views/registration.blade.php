@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/registration.css') }}" rel="stylesheet">
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

<div class="arrow-wrapper" style="padding: 16px 24px">
    <a href="{{ url()->previous() }}">
        <img src="{{ asset('pictures/arrow.svg') }}">
    </a>
</div>
<div class="informational-banner">
    <p class="h2-mobile-bold">Kul att du vill komma</p>
    <p class="body-2">Här anger du grundläggande information för att kunna anmäla dig till evenemanget. Det är möjligt att lägga till mer information i nästa steg.</p>
    <p class="body-2">Har du redan anmält ditt företag?</p>
    <a href="{{ route('login') }}"><button class="btn btn-m secondary button-large">Logga in</button></a>
</div>

<main class="mainRegistration">    
    @if (session('message'))
    <div class="success">
        <img src="{{ asset('pictures/icons/People.svg') }}">
        <p class="body-1">{{ session('message') }}</p>
    </div>
    @elseif ($errors->any())
    <div class="errors">
        <img src="{{ asset('pictures/icons/warning.svg') }}">
        @foreach ($errors->all() as $error)
        <p class="body-2">{{ $error }}</p>
        @endforeach
    </div>
    @endif
    
    <div class="form-wrapper">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group-1 max-width">
            <div class="input-group">    
                <label for="name" class="body-1">Företag</label>
                <div class="input-relative">
                <input id="name" type="text" name="name" placeholder="Namn på företaget">
                <img src="{{ asset('pictures/icons/suitcase.svg') }}" class="input-icon">
            </div>
            </div>

            <div class="input-group">
                <label for="contact_name" class="body-1">Kontaktperson</label>
                <div class="input-relative">
                <input id="contact_name" type="text" name="contact_name" placeholder="Kontaktperson från företaget">
                <img src="{{ asset('pictures/icons/face.svg') }}" class="input-icon">
            </div>
            </div>

            <div class="participant-input">
                <label for="participant_count" class="body-1">Antal personer som deltar</label>
                <div class="input-wrapper">
                    <div class="minus" id="minus"></div>
                        <span id="participants">1</span>
                        <div class="plus" id="plus"></div>
                    </div>
                </div>
            <input id="participant_count" type="number" name="participant_count" value="1" required autocomplete="participant_count" autofocus>
        
            <div class="input-group">
                <label for="email" class="body-1">Email</label>
                <div class="input-relative">
                <input type="email" id="email" name="email" placeholder="Mejl Yrgos studenter kan nå er på">
                <img src="{{ asset('pictures/icons/email.svg') }}" class="input-icon">
                </div>
            </div>

            <div class="input-group">
                <label for="password" class="body-1">Lösenord</label>
                <div class="input-relative">
                <input type="password" id="password" name="password" placeholder="Minst 8 tecken">
                <img src="{{ asset('pictures/icons/security.svg') }}" class="input-icon">
                </div>
            </div>
            </div>
            <div class="informational-banner">
                <p>Vi ber om ett lösenord så att du enkelt kan logga in och redigera din information senare.</p>
            </div>

            <div class="gdpr">
                {{-- form med checkbox? --}}
                <a href="">LÄS MER OM BEHANDLING AV PERSONUPPGIFTER</a>
            </div>
        
            <div class="submitButton">
                <button type="submit">ANMÄL!</button>
            </div>
        </form>
    </div>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/registration.js') }}"></script>
@endsection