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
            <p class="h2-mobile-bold">Du är anmäld!</p>
            <p class="body2">För att studenterna på Yrgo ska kunna lära känna er verksamhet så bra som möjligt, är det uppskattat om ni fyller i så mycket som möjligt i kommande steg. På så sätt kan de hitta rätt när de ska söka LIA-platser.</p>
        </div>

        @if (session('message'))
            <div class="success">
                <p class="body-2">{{ session('message') }}</p>
            </div>
        @elseif ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p class="body-2">{{ $error }}</p>
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
                    <p id="upload-response" class="body-1">Ladda upp logga</p>
            </div>
            
            <!-- Företagsnamn -->
            <div class="input-group">    
                <label for="name" class="body-1">Företag</label>
                <input id="name" type="text" name="name" value=" {{ $user->name }}" required autocomplete="name" autofocus>
            </div>

            <!-- Kontaktperson -->
            <div class="input-group">
                <label for="contact_name" class="body-1">Kontaktperson</label>
                <input id="contact_name" type="text" name="contact_name" value=" {{ $user->contact_name }}" placeholder="{{ $user->contact_name }}" required autocomplete="contact_name" autofocus>
            </div>

            <!-- Contact Email -->
            <div class="input-group">
                <label for="contact_email" class="body-1">Email</label>
                <input type="email" id="contact_email" name="contact_email" value="{{ $user->email }}">
            </div>

            <!-- Participants -->
            <div class="participant-input">
                <label for="participant_count" class="body-1">Antal personer som deltar</label>
                <div class="input-wrapper">
                    <div class="minus" id="minus"></div>
                        <span id="participants">{{ $user->participant_count }}</span>
                        <div class="plus" id="plus"></div>
                    </div>
                    <input id="participant_count" type="number" name="participant_count" value="{{ $user->participant_count > 1 ? $user->participant_count : 1 }}" required autocomplete="participant_count" autofocus>
                </div>
            
            <!-- Contact URL -->
            <div class="input-group">
                <label for="contact_url" class="body-1">Webbsida</label>
                <input type="text" id="contact_url" name="contact_url" value="{{ old('contact_url', $profile->contact_url) }}">
            </div>

            <!-- Contact LinkedIn -->
            <div class="input-group">
                <label for="contact_LinkedIn" class="body-1">LinkedIn</label>
                <input type="text" id="contact_LinkedIn" name="contact_LinkedIn" value="{{ old('contact_LinkedIn', $profile->contact_LinkedIn) }}">
            </div>

            <!-- Has LIA -->
            <div class="LIA-container">
                <div class="LIA-txt-wrapper">
                    <label for="has_LIA" class="h4-desktop-bold">Tar emot LIA</label>
                    <p class="body-2">Period: November 2024 - Maj 2025</p>
                </div>
                    <div class="radio-wrapper">
                        <div class="radio-btn-wrapper">
                            <p class="h3-desktop-bold">Ja</p> <input type="radio" id="has_LIA_true" name="has_LIA" value="true" {{ $profile->has_LIA ? 'checked' : '' }}></div>
                        <div class="radio-btn-wrapper"><p class="h3-desktop-bold">Vet ej</p> <input type="radio" id="has_LIA_false" name="has_LIA" value="false" {{ !$profile->has_LIA ? 'checked' : '' }}></div>
                    </div>
            </div>
            
            {{-- Tags --}}
            @foreach($profile->tags as $tag)
            @if ($tag->isPicked)
            <p>{{ $tag->tag_name }}</p>
            @endif
            @endforeach

            <div class="tag-select-wrapper">
                <p class="h2-mobile-bold">Vad vi söker</p>
                <p class="body-2">Välj upp till 10 tags</p>
                <div class="tab-nav-wrapper">
                    <div class="tab-wrapper one"><img src="{{ asset('pictures/icons/software.svg') }}"><a href="#" class="body-2">Software</a></div>
                    <div class="tab-wrapper two"><img src="{{ asset('pictures/icons/design.svg') }}"><a href="#" class="body-2">Design</a></div>
                    <div class="tab-wrapper three"><img src="{{ asset('pictures/icons/webdev.svg') }}"><a href="#" class="body-2">Web dev</a></div>
                </div>
                
                <div class="tab-content-wrapper">
                    <div class="tab1-c">
                        @foreach ($softwareTags as $tag)
                            <a href="#" class="tag-toggle tag body-2" data-tag-id="{{ $tag->id }}">{{ $tag->tag_name }}</a>
                        @endforeach
                    </div>
                    <div class="tab2-c">
                        @foreach ($designTags as $tag)
                        <a href="#" class="tag-toggle tag body-2" data-tag-id="{{ $tag->id }}">{{ $tag->tag_name }}</a>
                        @endforeach
                    </div>
                    <div class="tab3-c">
                        @foreach ($developerTags as $tag)
                        <a href="#" class="tag-toggle tag body-2" data-tag-id="{{ $tag->id }}">{{ $tag->tag_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- About -->
            <div class="about-wrapper" style="position: relative;">
                <label for="about" id="aboutlabel" class="h3-mobile-bold">Om oss</label>
                <textarea id="about" name="about" maxlength="150">{{ old('about', $profile->about) }}</textarea>
                <span id="counter">150 / 150</span>
            </div>
            <div class="button-wrapper">
            <button class="btn btn-m primary">Spara din profil</button>
            </div>
        </form>
    </div>

<!-- This Or That -->

<div class="questionWrapper">
    <p class="femsnabba removeMargin">SVARA PÅ YRGOS 5 SNABBA</p>
    <div class="circle">
        <a id='show-popup-link' href=""><img src="{{asset('pictures/Arrows.svg')}}" alt=""></a>
    </div>
</div>

<div id="popup-last-overlay" class="popup-last-overlay" style="display: none;">
    <div class="popup-content">
        <div  class="question">
            <label><p>Tack för att ni tog er tid till att svara!</p></label>
            <div class="answers">
                <div class="answer answerOne">
                    <img src="{{asset('pictures/icons/checkbox.svg')}}" alt="">
                    <label for="">Dina svar är nu inskickade.</label>
                </div>
            </div>
            <div class="skip">
                <button id="submit-button" class="submit-button" class=""><p>STÄNG</p></button>   
            </div>
        </div>
    </div>
</div>

<!-- Hidden popup container for questions -->
@foreach ($questions as $index => $question)
<div id="question-popup-{{ $index }}" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <div id="question-{{ $index }}" class="question" data-question-id="{{ $question->id }}">
            <div class="cross">
                <img id="exit" class="crossIMG" src="{{asset('pictures/cross.svg')}}" alt="">
            </div>
    
            <label><p>{{ $question->question }}</p></label>
            
            <div class="answers">
                <div class="answer answerOne">
                    <div class="answerIMG imgOne_{{ $index }}"></div>
                    <label for="choice_one_{{ $question->id }}">{{ $question->option_one }}</label>
                    <input type="radio" id="choice_one_{{ $question->id }}" name="questions[{{ $question->id }}]" value="option_one">
                </div>
                <div class="answer answerTwo">
                    <div class="answerIMG imgTwo_{{ $index }}"></div>
                    <input type="radio" id="choice_two_{{ $question->id }}" name="questions[{{ $question->id }}]" value="option_two">
                    <label for="choice_two_{{ $question->id }}">{{ $question->option_two }}</label>
                </div>
            </div>
            <div class="skip">
                <a href="#" class="next-question">Next Question</a>
                <button id="submit-button" style="display: none;">Submit Answers</button>   
            </div>
        </div>
    </div>
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

    @foreach($profile->tags as $tag)
    @if ($tag->isPicked)
    <p>{{ $tag->tag_name }}</p>
    @endif
    @endforeach

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".tab-content-wrapper > div").first().css('display', 'flex');
            $(".tab-wrapper:first").addClass('current-tab');

            $(".tab-nav-wrapper .tab-wrapper").click(function (event) {
                event.preventDefault();
                $(".current-tab").removeClass("current-tab");
                $(this).addClass("current-tab");
                $(".tab-content-wrapper > div").hide();
                var index = $(this).index();
                $(".tab-content-wrapper > div").eq(index).css('display', 'flex');
            });
        });
        </script>
    <script src="{{ asset('js/profile.js') }}"></script>
    {{-- <script src="{{ asset('js/popup.js') }}"></script> --}}
    <script src="{{ asset('js/femsnabba.js') }}"></script>
@endsection