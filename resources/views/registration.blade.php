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

<main class="mainRegistration">    
<div class="arrow-wrapper" style="padding: 16px 24px">
    <a href="{{ url()->previous() }}">
        <img src="{{ asset('pictures/arrow.svg') }}">
    </a>
</div>
<div class="informational-banner bigBannerDesktop">
    <p class="h2-mobile-bold">Kul att du vill gå</p>
    <div class="info-text">
    <p class="body-2">Här anger du grundläggande information för att kunna anmäla dig till evenemanget. Det är möjligt att lägga till mer information i nästa steg.</p>
    <p class="body-2">Har du redan anmält ditt företag?</p>
    </div>
    <a href="{{ route('login') }}"><button class="btn btn-m secondary button-large">Logga in</button></a>
</div>

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
        <form class="formDesktop" id="registrationForm" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="test">
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
                <input style="display: none" id="participant_count" type="number" name="participant_count" value="1" required autocomplete="participant_count" autofocus>
            </div>
        </div>
        <div class="test2 max-width">
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
                <div class="informational-banner" style="border-radius: 30px 30px 0px 30px">
                    <p>Vi ber om email och lösenord så att du enkelt kan logga in och redigera din information senare. Kom ihåg att mail-adressen kommer att vara synlig på event-sidan.</p>
                </div>
                <div></div>
            
                <div class="input-group-alignstart">
                    {{-- form med checkbox? --}}
                    <div class="gdpr-checkbox">
                        <input id="checkboxInput" type="checkbox" name="checkbox">
                        <label for="checkbox"><p>Godkänn lagring av <br> personuppgifter</p></label>
                    </div>
                    <a class="underline-regular" id="show-gdpr" href="">LÄS MER OM BEHANDLING <br> AV PERSONUPPGIFTER</a>
                </div>
                <div class="submitButton">
                    <button class="btn btn-m primary button-large" type="submit">ANMÄL!</button>
                </div>
            </div>
        </form>
    </div>
    <div id="gdpr-background" class="gdpr-background">
        <div id="gdprPopup" class="gdprPopup">
            <div class="gdprPopup-content">
                <p class="h2-mobile-bold">Integritetspolicy</p>
                <p class="body-1">Vi tar din integritet på stort allvar och behandlar dina personuppgifter med omsorg och säkerhet. Det vi samlar in används endast för att administrera det specifika eventet. 
                    <br><br>
                    Du har rättigheter enligt tillämplig lagstiftning, inklusive rätten att få tillgång till dina personuppgifter, begära rättelse eller radering av uppgifter, samt att invända mot behandling. För ytterligare frågor eller för att utöva dina rättigheter får du gärna kontakta oss.
                    </p>
            </div>
            <button id="close-gdpr-popup" class="btn btn-s primary">OK!</button>
        </div>
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