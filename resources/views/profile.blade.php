@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
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
    <div class="arrow-wrapper">
        <a href="{{ url()->previous() }}">
            <img src="{{ asset('pictures/arrow.svg') }}">
        </a>
        @if($editable)
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-s primary" type="submit">LOGGA UT</button>
        </form>
        @endif
    </div>

    @if ($editable)
        <div class="informational-banner">
            <p class="h1-mobile">Du är anmäld!</p>
            <p>För att studenterna på Yrgo ska kunna lära känna er verksamhet så bra som möjligt, är det uppskattat om ni fyller i så mycket som möjligt i kommande steg. På så sätt kan de hitta rätt när de ska söka LIA-platser.</p>
        </div>

        @if (session('message'))
            <div class="success">
                <p>{{ session('message') }}</p>
            </div>
        @elseif ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-wrapper">
            <form method="POST" action="{{ route('profile.update', ['profile' => $profile->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

            <!-- Profile image -->
            <div class="image-input-wrapper">
                <input type="file" id="profile_image" name="profile_image" accept="image/png, image/jpeg, image/jpg, image/svg">
                <label for="profile_image" name="profile_image" id="profile_image" class="image-upload"></label>
                    <p id="upload-response">Ladda upp logga</p>
            </div>
            
            <!-- Företagsnamn -->
            <div class="input-group">    
                <label for="name">Företag</label>
                <input id="name" type="text" name="name" value=" {{ $user->name }}" required autocomplete="name" autofocus>
            </div>

            <!-- Kontaktperson -->
            <div class="input-group">
                <label for="contact_name">Kontaktperson</label>
                <input id="contact_name" type="text" name="contact_name" value=" {{ old('contact_name') }}" placeholder="{{ $user->contact_name }}" required autocomplete="contact_name" autofocus>
            </div>

            <!-- Contact Email -->
            <div class="input-group">
                <label for="contact_email">Email</label>
                <input type="email" id="contact_email" name="contact_email" value="{{ $user->email }}">
            </div>

            <!-- Participants -->
            <div class="participant-input">
                <label for="participant_count">Antal personer som deltar</label>
                <div class="input-wrapper">
                    <div class="minus" id="minus"></div>
                        <span id="participants">{{ $user->participant_count }}</span>
                        <div class="plus" id="plus"></div>
                    </div>
                    <input id="participant_count" type="number" name="participant_count" value="{{ $user->participant_count > 1 ? $user->participant_count : 1 }}" required autocomplete="participant_count" autofocus>
                </div>
            
            <!-- Contact URL -->
            <div class="input-group">
                <label for="contact_url">Webbsida</label>
                <input type="text" id="contact_url" name="contact_url" value="{{ old('contact_url', $profile->contact_url) }}">
            </div>

            <!-- Contact LinkedIn -->
            <div class="input-group">
                <label for="contact_LinkedIn">LinkedIn</label>
                <input type="text" id="contact_LinkedIn" name="contact_LinkedIn" value="{{ old('contact_LinkedIn', $profile->contact_LinkedIn) }}">
            </div>

            <!-- Has LIA -->
            <div class="input-group">
                <label for="has_LIA">Tar emot LIA</label>
                    <p class="body">Period: November 2024 - Maj 2025</p>
                <div class="radio-wrapper">
                    <div class="radio-btn-wrapper"><p class="h3-bold">Ja</p> <input type="radio" id="has_LIA_true" name="has_LIA" value="true" {{ $profile->has_LIA ? 'checked' : '' }}></div>
                    <div class="radio-btn-wrapper"><p class="h3-bold">Vet ej</p> <input type="radio" id="has_LIA_false" name="has_LIA" value="false" {{ !$profile->has_LIA ? 'checked' : '' }}></div>
                </div>
            </div>
            
            {{-- Tags system later --}}
            <h4>Tags:</h4>
            <ul>
                @foreach ($profile->tags as $tag)
                    <li>
                        <a href="#" class="tag-toggle" data-tag-id="{{ $tag->id }}">{{ $tag->tag_name }}</a>
                    </li>
                @endforeach
            </ul>

            <!-- About -->
            <label for="about">About:</label>
            <textarea id="about" name="about">{{ old('about', $profile->about) }}</textarea>
            <button type="submit">Spara din profil</button>
        </form>
    </div>

<!-- This Or That -->
@foreach ($questions as $question)
<div class="question">
    <label>{{ $question->question }}</label>

    <input type="radio" id="choice_one_{{ $question->id }}" name="questions[{{ $question->id }}]" value="option_one">
    <label for="choice_one_{{ $question->id }}">{{ $question->option_one }}</label>

    <input type="radio" id="choice_two_{{ $question->id }}" name="questions[{{ $question->id }}]" value="option_two">
    <label for="choice_two_{{ $question->id }}">{{ $question->option_two }}</label>
</div>
@endforeach        

    @foreach ($questions as $question)
    <div class="question">
        <p>{{ $question->question }}</p>
        <p>Answer: {{ $question->chosen_option == 'option_one' ? $question->option_one : $question->option_two }}</p>
    </div>
    @endforeach

    @else

    <!-- Display static profile content. Maybe use different layout sections?? -->

    @if($profile->profile_image)
    <div class="profile-img"><img src="{{ asset('storage/profile_images/' . $profile->profile_image) }}"></div>
    @endif

    @foreach ($questions as $question)
    <div class="question">
        <p>{{ $question->question }}</p>
        <p>Answer: {{ $question->chosen_option == 'option_one' ? $question->option_one : $question->option_two }}</p>
    </div>
    @endforeach
    @endif
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection