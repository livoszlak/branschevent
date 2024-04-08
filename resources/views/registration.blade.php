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
<div class="formRegistrationWrapper">
    <div class="promptForInfo">
        <h2>Kul att du hör av dig!</h2>
        <p>Här anger du grundläggande information för att kunna anmäla dig till evenemanget. Det är möjligt att lägga till mer information i nästa steg.</p>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form group">    
            <label for="name">Företag</label>
            <input id="name" type="text" name="name" value=" {{ old('name') }}" required autocomplete="name" autofocus>
        </div>

        <div class="form group">
            <label for="contact_name">Kontaktperson</label>
            <input id="contact_name" type="text" name="contact_name" value=" {{ old('contact_name') }}" required autocomplete="contact_name" autofocus>
        </div>

        <div class="form-group">
            <p>Antal personer som deltar</p>
            <button class="-">-</button>
            <div class="personerAntal">
                <label for="antalPersoner">0</label>
                <input id="participant_count" type="number" name="participant_count" value=" {{ old('participant_count') }}" required autocomplete="participant_count" autofocus> {{-- personer som deltar value --}} 
            </div>
            <button class="+">+</button>
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
    
        <div class="form-group">
            <label for="password">Lösenord</label>
            <input id="password" type="password" name="password" value="{{ old('password') }}" required autocomplete="password">
        </div>

        <div class="promptForInfo">
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
