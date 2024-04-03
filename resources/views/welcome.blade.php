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
    <div class="landingpageWrapper">
        <div class="welcomePage">
            <h1>Välkommen till vårat event</h1>
            <section>
                <p>Detta är ett event för YRGO där Studenter och Företag kan networka och knyta kontakter! <br>
                blafjanefablablablablabla</p>
    
                @if(Auth::user())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logga ut</button>
                    </form>
                @else
                    <a href="/login">Logga in</a>
                @endif
            </section>
        </div>
        <div class="whoIsComingPage">
            <section>
                <h1>Välkommen till det bästa eventet</h1>
                <p>Lorem ipsum dolor sit amet consectetur. Dictum interdum aliquam sit cras lacus feugiat. Proin quis euismod odio adipiscing nunc feugiat ante. Arcu dui ut ornare lorem. Volutpat tristique eu bibendum nulla nisi faucibus scelerisque sed.
                </p>
                <button class="button whoIsComingButton"></button>
            </section>
            <section>
                <h3>ROLLING TEXT</h3>
            </section>
            <section>
                <img src="#" alt="img of visual arena at lindholmen">
                <ul>
                    <li>Visual Arena</li>
                    <li>Lindholmen Science Park</li>
                    <li>Lindholmspiren 3 <br> 417 56 Göteborg</li>
                </ul>
                <p>Bullet point?</p>
            </section>
        </div>
        <div class="weatYrgo">
            <section>
                <img src="#" alt="bild på yrgo?">
                <p>Lorem ipsum dolor sit amet consectetur. Dictum interdum aliquam sit cras lacus feugiat. Proin quis euismod odio adipiscing nunc feugiat ante. Arcu dui ut ornare lorem. Volutpat tristique eu bibendum nulla nisi faucibus scelerisque sed.
                </p>
                <p>Lorem ipsum dolor sit amet consectetur. Dictum interdum aliquam sit cras lacus feugiat. Proin quis euismod odio adipiscing nunc feugiat ante. Arcu dui ut ornare lorem. Volutpat tristique eu bibendum nulla nisi faucibus scelerisque sed.
                </p>
                <a href="https://www.yrgo.se/program/digital-designer/">DIGITAL DESIGN</a>
                <a href="https://www.yrgo.se/program/webbutvecklare/">WEBBUTVECKLARE</a>
            </section>
        </div>
    </div>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection
