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
<section class="welcomeHero">
    <img src="{{ asset('pictures/Hero.png') }}" alt="">
    <button class="Anmalforetag btn btn-m" id="Anmalforetag">
        <a href="/registration">ANMÄL FÖRETAG</a>
    </button>
</section>
<main>
    <div class="landingpageWrapper">
        <div class="welcomePage">
        </div>
        <div class="whoIsComingPage">
            <h1>Välkommen till det bästa eventet</h1>
            <p class="inter">Vi studenter från Yrgo, Digital Design och Webbutveckling, bjuder in branschkollegor till ett LIA-event. Det är ett tillfälle där vi alla kan mötas, nätverka och lära känna varandra bättre. Vi ser fram emot att dela våra erfarenheter och kunskaper med er, och samtidigt lära oss mer om era olika verksamheter och karriärmöjligheter.
                <br><br>
                Vi tror att detta event kommer att vara en utmärkt möjlighet för både studenter och branschkollegor att utforska möjligheter till framtida samarbeten och praktikplatser. Så ta chansen att mingla, utbyta idéer och kanske till och med hitta er framtida praktikant.
            </p>
            <button class="btn btn-m whoIsComingBtn">VEM KOMMER?</button>
        </div>
        <div class="marquee">
            <div class="marquee-content scroll">
                @foreach ($companies as $company)
                    <h3 class="">- {{ $company }}</h3>
                    <h3>- JEPPE</h3> {{-- !!!!!!!!!!!!!!!!!TA BORT SEN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
                    <h3>- HCUDCSC</h3> {{-- !!!!!!!!!!!!!!!!!TA BORT SEN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
                    <h3>- TESTFÖRETAG</h3>
                    <h3>- TESTFÖRETAG</h3>
                    <h3>- TESTFÖRETAG</h3>
                @endforeach
                
            </div>
            <div class="marquee-content scroll">
                @foreach ($companies as $company)
                    <h3 class="">- {{ $company }}</h3>
                    <h3>- :-)</h3> {{-- !!!!!!!!!!!!!!!!!TA BORT SEN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
                    <h3>- MONKEY</h3> {{-- !!!!!!!!!!!!!!!!!TA BORT SEN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
                    <h3>- TESTFÖRETAG</h3>
                    <h3>- TESTFÖRETAG</h3>
                    <h3>- TESTFÖRETAG</h3>
                @endforeach
                
            </div>
        </div>
        <div class="whereWrapper">
            <img src="{{asset('pictures/location.png')}}" alt="img of visual arena at lindholmen">
            <ul class="removeMargin">
                <h1 class="removeMargin">Vart någonstans?</h1>
                <li>Visual Arena</li>
                <li>Lindholmen Science Park</li>
                <br>
                <li>Lindholmspiren 3 <br> 417 56 Göteborg</li>
            </ul>
        </div>
        <div class="weatYrgo">
            <div class="aboutTitleContainer">
                <div class="LIApicture">
                    <img src="{{asset('pictures/tempRectangle.png')}}" alt="bild på yrgo?">
                    <h2 class="LIAtextFloating">Vår LIA-period</h2>
                </div>
            </div>
            <div class="aboutTextContainer">
                <p>LIA är en viktigt period för oss studenter. Det ger oss möjlighet att träna och utveckla våra färdigheter i en verklig arbetsmiljö inom vår framtida yrkesroll. Under LIA får vi inte bara praktisk erfarenhet utan även chansen att knyta värdefulla kontakter i branschen. 
                    <br><br>
                    Vår LIA-period är mellan <br>
                    25 november 2024- 30 maj 2025.
                </p>
                <div class="classLink">
                    <img src="{{asset('pictures/Design.png')}}" alt="">
                    <a href="https://www.yrgo.se/program/digital-designer/">DIGITAL DESIGN</a>
                </div>
                <div class="classLink">
                    <img src="{{asset('pictures/Development.png')}}" alt="">
                    <a href="https://www.yrgo.se/program/webbutvecklare/">WEBBUTVECKLARE</a>
                </div>
                <div class="extraGap"></div>
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