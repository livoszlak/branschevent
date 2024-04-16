@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
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
<button class="Anmalforetag btn btn-m primary" id="Anmalforetag">
    <a class="button-large" href="{{ route('registration') }}">ANMÄL FÖRETAG</a>
</button>
<section class="welcomeHero">
    <img src="{{ asset('pictures/Hero.svg') }}" alt="">
</section>
<main>
    <div class="landingpageWrapper">
        <div class="welcomePage">
            <img src="{{asset('pictures/Heroimg.svg')}}" alt="">
            <div class="whoIsComingPageDesktop">
                <p class="h1-mobile-regular">Välkommen till bästa LIA-eventet</p>
                <p class="body-2">Vi studenter från Yrgo, Digital Design och Webbutveckling, bjuder in branschkollegor till ett LIA-event. Det är ett tillfälle där vi alla kan mötas, nätverka och lära känna varandra bättre. Vi ser fram emot att dela våra erfarenheter och kunskaper med er, och samtidigt lära oss mer om era olika verksamheter och karriärmöjligheter.
                    <br><br>
                    Vi tror att detta event kommer att vara en utmärkt möjlighet för både studenter och branschkollegor att utforska möjligheter till framtida samarbeten och praktikplatser. Så ta chansen att mingla, utbyta idéer och kanske till och med hitta er framtida praktikant.
                </p>
                <button class="btn btn-m secondary"><a id="firstmark" class="button-large" href="{{ route('attendees') }}">VEM KOMMER?</a></button>
            </div>
        </div>
        <div class="whoIsComingPage">
            <p class="h1-mobile-regular">Välkommen till bästa LIA-eventet</p>
            <p class="body-2">Vi studenter från Yrgo, Digital Design och Webbutveckling, bjuder in branschkollegor till ett LIA-event. Det är ett tillfälle där vi alla kan mötas, nätverka och lära känna varandra bättre. Vi ser fram emot att dela våra erfarenheter och kunskaper med er, och samtidigt lära oss mer om era olika verksamheter och karriärmöjligheter.
                <br><br>
                Vi tror att detta event kommer att vara en utmärkt möjlighet för både studenter och branschkollegor att utforska möjligheter till framtida samarbeten och praktikplatser. Så ta chansen att mingla, utbyta idéer och kanske till och med hitta er framtida praktikant.
            </p>
            <button class="btn btn-m secondary"><a class="button-large" href="{{ route('attendees') }}">VEM KOMMER?</a></button>
        </div>
        <div class="marquee">
            <div class="marquee-content scroll">
                @foreach ($companies as $company)
                    <h3>{{ $company }}</h3>
                    <h3>•</h3>
                @endforeach
                
            </div>
            <div class="marquee-content scroll">
                @foreach ($companies as $company)
                    <h3>{{ $company }}</h3>
                    <h3>•</h3>
                @endforeach
                
            </div>
        </div>
        <div class="whereWrapper">
            <div class="kartbild"></div>
            <div class="whereTextContent">
                <p class="h3-mobile-bold">Vart någonstans?</p>
                <p class="body-2">Visual Arena<br>
                Lindholmen Science Park</p>
                <br>
                <p class="body-2">Lindholmspiren 3<br>
                417 56 Göteborg</p> <div id="mark" style="margin-block-start: 30px"></div>
                </div>
        </div>
        <div class="weatYrgo">
            <div class="aboutTitleContainer">
                <div class="LIApicture">
                    <img src="{{asset('pictures/lia1000.png')}}" alt="bild på yrgo?" style="width: 100%">
                    <p class="LIAtextFloating h2-mobile-bold">Vår LIA-period</p>
                </div>
            </div>
            <div class="aboutTextContainer">
                <p class="body-2 body-2desktop">LIA är en viktig period för oss studenter. Det ger oss möjlighet att träna och utveckla våra färdigheter i en verklig arbetsmiljö inom vår framtida yrkesroll. Under LIA får vi inte bara praktisk erfarenhet utan även chansen att knyta värdefulla kontakter i branschen.</p> 
                    <p class="body-2">Vår LIA-period är mellan <br> 25 november 2024 - 30 maj 2025.</p>
                    <p class="body-2">Läs mer om våra kurser på YRGOs webbplats:</p>
                <div class="classLink">
                    <img src="{{asset('pictures/icons/design.svg')}}" alt="">
                    <a href="https://www.yrgo.se/program/digital-designer/" class="link-large">DIGITAL DESIGN</a>
                </div>
                <div class="classLink">
                    <img src="{{asset('pictures/icons/webdev.svg')}}" alt="">
                    <a href="https://www.yrgo.se/program/webbutvecklare/" class="link-large">WEBBUTVECKLARE</a>
                </div>
                <div id="extraGap" class="extraGap"></div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection