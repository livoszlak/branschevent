@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
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
<main>
    // Show profiles
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection