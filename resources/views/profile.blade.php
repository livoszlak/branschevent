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
            <p class="body-2">För att studenterna på Yrgo ska kunna lära känna er verksamhet så bra som möjligt, är det uppskattat om ni fyller i så mycket som möjligt i kommande steg. På så sätt kan de hitta rätt när de ska söka LIA-platser.</p>
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
            <form class="form-wrapper-child" method="POST" action="{{ route('profile.update', ['profile' => $profile->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

            <!-- Profile image -->
            <div class="image-input-wrapper">
                <input type="file" id="profile_image" name="profile_image" accept="image/png, image/jpeg, image/jpg, image/svg">
                <label for="profile_image" name="profile_image" id="profile_image" class="image-upload"></label>
                    <p id="upload-response" class="body-1">Ladda upp logga</p>
            </div>
            
            <div class="form-group-1 max-width">
                <!-- Företagsnamn -->
                <div class="input-group">    
                    <label for="name" class="body-1">Företag</label>
                    <div class="input-relative">
                    <input id="name" type="text" name="name" value=" {{ $user->name }}" required autocomplete="name" autofocus>
                    <img src="{{ asset('pictures/icons/suitcase.svg') }}" class="input-icon">
                </div>
                </div>

                <!-- Kontaktperson -->
                <div class="input-group">
                    <label for="contact_name" class="body-1">Kontaktperson</label>
                    <div class="input-relative">
                    <input id="contact_name" type="text" name="contact_name" value=" {{ $user->contact_name }}" placeholder="{{ $user->contact_name }}" required autocomplete="contact_name" autofocus>
                    <img src="{{ asset('pictures/icons/face.svg') }}" class="input-icon">
                </div>
                </div>

                <!-- Contact Email -->
                <div class="input-group">
                    <label for="contact_email" class="body-1">Email</label>
                    <div class="input-relative">
                    <input type="email" id="contact_email" name="contact_email" value="{{ $user->email }}">
                    <img src="{{ asset('pictures/icons/email.svg') }}" class="input-icon">
                    </div>
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
                    <div class="input-relative">
                    <input type="text" id="contact_url" name="contact_url" value="{{ old('contact_url', $profile->contact_url) }}">
                    <img src="{{ asset('pictures/icons/link.svg') }}" class="input-icon">
                </div>
                </div>

                <!-- Contact LinkedIn -->
                <div class="input-group">
                    <label for="contact_LinkedIn" class="body-1">LinkedIn</label>
                    <div class="input-relative">
                    <input type="text" id="contact_LinkedIn" name="contact_LinkedIn" value="{{ old('contact_LinkedIn', $profile->contact_LinkedIn) }}">
                    <img src="{{ asset('pictures/icons/linkedin.svg') }}" class="input-icon">
                </div>
            </div>
            </div>

                <!-- Has LIA -->
                <div class="LIA-container max-width">
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
            
            <div class="tag-select-wrapper max-width">
                <p class="h2-mobile-bold" style="margin-bottom: 24px">Vad vi söker</p>
                    <p class="body-2" style="margin-bottom: 24px">Välj upp till 10 tags</p>
                    <div class="chosen-tags" id="chosen-tags">
                    @foreach($profile->tags as $tag)
                                @if ($tag->isPicked)
                                    <a class="tag tag-picked chosen-tag">{{ $tag->tag_name }}</a>
                                @endif
                            @endforeach
                        </div>
                <div class="tab-nav-wrapper">
                    <div class="tab-wrapper one"><img src="{{ asset('pictures/icons/software.svg') }}"><a href="#" class="body-2">Software</a></div>
                    <div class="tab-wrapper two"><img src="{{ asset('pictures/icons/design.svg') }}"><a href="#" class="body-2">Design</a></div>
                    <div class="tab-wrapper three"><img src="{{ asset('pictures/icons/webdev.svg') }}"><a href="#" class="body-2">Web dev</a></div>
                </div>
                
                <div class="tab-content-wrapper">
                    <div class="tab1-c">
                        @foreach ($softwareTags as $tag)
                            <a href="#" class="tag-toggle tag body-2 {{ $tag->isPicked ? "tag-picked" : "" }}" data-tag-id="{{ $tag->id }}">{{ $tag->tag_name }}</a>
                        @endforeach
                    </div>
                    <div class="tab2-c">
                        @foreach ($designTags as $tag)
                        <a href="#" class="tag-toggle tag body-2 {{ $tag->isPicked ? "tag-picked" : "" }}" data-tag-id="{{ $tag->id }}">{{ $tag->tag_name }}</a>
                        @endforeach
                    </div>
                    <div class="tab3-c">
                        @foreach ($developerTags as $tag)
                        <a href="#" class="tag-toggle tag body-2 {{ $tag->isPicked ? "tag-picked" : "" }}" data-tag-id="{{ $tag->id }}">{{ $tag->tag_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- About -->
            <div class="about-wrapper max-width" style="position: relative;">
                <div class="label-wrapper" id="aboutlabelwrapper">
                <label for="about" id="aboutlabel"><p class="h3-mobile-bold">Om oss</p></label><img src="{{asset('pictures/icons/edit.svg')}}" alt=""></div>
                <textarea id="about" name="about" maxlength="150" class="body-2">{{ old('about', $profile->about) }}</textarea>
                <span id="counter" class="caption-regular"></span>
            </div>
            <!-- This Or That -->
            
            <div class="questionWrapper">
                <img class="blueunion5snabba" src="{{asset('pictures/blueunion5snabba.svg')}}" alt="">
                <img class="redunion5snabba" src="{{asset('pictures/redunion5snabba.svg')}}" alt="">
                <div class="lightblue-union">
                    <img class="yellowcircle" src="{{asset('pictures/icons/Ellipse 4.svg')}}" alt="">
                    <img class="darkbluecirclesmall" src="{{asset('pictures/icons/Ellipse 6.svg')}}" alt="">
                    <img class="redcirclesmall" src="{{asset('pictures/icons/Ellipse 7.svg')}}" alt="">
                    <img class="darkbluecirclebig" src="{{asset('pictures/icons/Ellipse 8.svg')}}" alt="">
                    <img class="redcirclesmallleft" src="{{asset('pictures/icons/Ellipse 9.svg')}}" alt="">
                    <img class="greyrectangle" src="{{asset('pictures/icons/Ellipse93.svg')}}" alt="">
                    <p class="femsnabba removeMargin">SVARA PÅ YRGOS 5 SNABBA</p>
                    <div class="circle">
                        <a id='show-popup-link' href=""><img src="{{asset('pictures/Arrows.svg')}}" alt=""></a>
                    </div>
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
                            <img id="exit" class="crossIMG exit-button" src="{{asset('pictures/cross.svg')}}" alt="">
                        </div>
                
                        <label><p>{{ $question->question }}</p></label>
                        
                        <div class="answers">
                            <div class="answer answerOne" data-option="option_one">
                                <div class="answerIMG imgOne_{{ $index }}"></div>
                                <label for="choice_one_{{ $question->id }}">{{ $question->option_one }}</label>
                                <input type="hidden" id="choice_one_{{ $question->id }}" name="questions[{{ $question->id }}]" value="option_one">
                            </div>
                            <div class="answer answerTwo" data-option="option_two">
                                <div class="answerIMG imgTwo_{{ $index }}"></div>
                                <input type="hidden" id="choice_two_{{ $question->id }}" name="questions[{{ $question->id }}]" value="option_two">
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
            <div class="button-wrapper">
            <button class="btn btn-m primary">Spara ändringar</button>
            </div>
        </form>
        <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-s secondary">Ta bort anmälan</button>
        </form>
    </div>

    @else

    <!-- Display static profile content. Maybe use different layout sections?? -->

    <!-- Profile image & company name -->
    <div class="profile-section-row ">
        <div class="logo-name-container">
            @if($profile->profile_image)
                <div class="profile-img"><img src="{{ asset('storage/profile_images/' . $profile->profile_image) }}"></div>
            @else
                <div class="profile-img default">
                    <p class="h2-desktop-bold">{{ collect(explode(' ', $user->name))->map(function($word) { return strtoupper(substr($word, 0, 1)); })->implode('') }}</p>
                </div>
            @endif
            <p class="h1-mobile-bold">{{ $user->name }}</p>
        </div>

        <!-- Selected tags -->
        @if(count($pickedTags) > 0)
        <div class="selected-tags-container">
            <p class="body-2" style="font-weight: 400">Vi söker dig som kan</p>
            <div class="selected-tags-wrapper">
                @foreach($profile->tags as $tag)
                    @if ($tag->isPicked)
                        <a class="tag tag-picked body-2">{{ $tag->tag_name }}</a>
                    @endif
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <!-- Has LIA -->
    @if ($profile->has_LIA)
    <div class="LIA-banner">
        <img src="{{ asset('pictures/icons/stars.svg') }}">
        <p class="attention">Vi tar emot LIA 2024!</p>
        <img src="{{ asset('pictures/icons/stars.svg') }}">
    </div>
    @endif

    <div class="flexprofileDesktop">
        <!-- Five questions -->
        <section class="slider-wrapper">
            <p class="h3-mobile-bold">5 snabba om {{ $profile->user->name }}!</p>
            <ul class="slides-container" id="slides-container">
                @foreach ($questions as $question)
                <li class="slide">
                    <div class="carousel-item">
                        <div class="carousel-question"><p class="h6-italic">{{ $question->question }}</p></div>
                        <div class="carousel-answer-wrapper">
                            <div class="carousel-answer {{ $question->chosen_option == 'option_one' ? 'picked-answer' : '' }}"><p class="body-2">{{ $question->option_one }}</p></div>
                            <div class="carousel-answer {{ $question->chosen_option == 'option_two' ? 'picked-answer' : '' }}"><p class="body-2">{{ $question->option_two }}</p></div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="slider-button-wrapper">
                <button class="btn btn-s secondary carousel" id="slide-arrow-prev">
                    <p class="button-medium">Förra</p>
                </button>
                    <button class="btn btn-s secondary carousel" id="slide-arrow-next">
                        <p class="button-medium">Nästa</p>
                    </button>
            </div>
        </section>

        <div class="columnDesktop">
            @if ($profile->about != null)
                    <div class="about-container">
                        <p class="h4-desktop-bold">Om oss</p>
                        <p class="body-1">{{ $profile->about }}</p>
                    </div>
            @endif

            <div class="contact-container">
                <p class="h4-desktop-bold">Kontakt</p>
                <p class="body-2">{{ $profile->user->contact_name }}<br>
                {{ $profile->user->email }}</p>
                <div class="contact-links">
                    <div class="link"><img src="{{ asset('pictures/icons/weburl.svg') }}"><a class="button-medium" style="text-decoration: underline" href="{{ $profile->contact_url != null ? $profile->contact_url : "" }}">Webbsida</a></div>
                    <div class="link"><img src="{{ asset('pictures/icons/profile-linkedin.svg') }}"><a class="button-medium" style="text-decoration: underline" href="{{ $profile->contact_LinkedIn != null ? $profile->contact_LinkedIn : "" }}">LinkedIn</a></div>
                </div>
            </div>
        </div>
    </div>
    <div></div>
    
    @endif
</main>
@endsection

@section('footer')
    {{-- specific footer content --}}
    @include('layouts.footer')
@endsection

@section('scripts')

@if ($editable)
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        /* Tag menu script*/

        $(document).ready(function() {
            $(".tab-content-wrapper > div").first().css('display', 'flex');
            $(".tab-wrapper:first").addClass('current-tab');

            $(".tab-nav-wrapper .tab-wrapper").click(function(event) {
                event.preventDefault();
                $(".current-tab").removeClass("current-tab");
                $(this).addClass("current-tab");
                $(".tab-content-wrapper > div").hide();
                var index = $(this).index();
                $(".tab-content-wrapper > div").eq(index).css('display', 'flex');
            });
        });

        $(document).ready(function() {
            $('.tag').on('click', function() {
                var tagText = $(this).text();
                var existingTag = $('#chosen-tags .chosen-tag').filter(function() {
                    return $(this).text() === tagText;
                });

                if (existingTag.length > 0) {
                    existingTag.remove();
                } else {
                    if ($('#chosen-tags .chosen-tag').length >= 10) {
                        return;
                    }
                    $('#chosen-tags').append($(this).clone().removeClass('tag-picked').addClass('chosen-tag').addClass('tag-picked'));
                }
            });
        });


        /* Tag max 10 selected frontend script */



        /* Characters left script */

        $(document).ready(function() {
            $('#about').on('keyup', function() {
                var maxLength = 150;
                var length = $(this).val().length;
                var length = maxLength-length;
                $('#counter').text(length + ' / ' + maxLength);
            });
            $('#about').trigger('keyup');
        });
    </script>
    
    <script src="{{ asset('js/profile.js') }}"></script>
    {{-- <script src="{{ asset('js/popup.js') }}"></script> --}}
    <script src="{{ asset('js/femsnabba.js') }}"></script>

    @else

    <script src="{{ asset('js/carousel.js') }}"></script>

    @endif
@endsection