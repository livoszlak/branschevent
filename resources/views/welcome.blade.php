@extends('layouts.app')

@section('title', 'Welcome')

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
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer');
@endsection
