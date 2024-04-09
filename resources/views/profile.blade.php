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
    <h3>Hello user</h3>
    <p>here u can change your profile blablabla</p>

    @if ($editable)
    <!-- Display editable form fields if user is visiting their own profile -->
    <form method="POST" action="{{ route('profile.update', ['profile' => $profile->id]) }}" enctype="multipart/form-data">
       
        @csrf
        @method('PUT')

        <div class="profile-img"><img src="{{ asset('storage/profile_images/' . $profile->profile_image) }}"></div>
        <!-- Profile image -->
        <label for="profile_image">Profile image:</label>
        <input type="file" id="profile_image" name="profile_image" accept="image/png, image/jpeg, image/jpg, image/svg">
        
        <!-- Contact Email -->
        <label for="contact_email">Contact Email:</label>
        <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $profile->contact_email) }}">
        
        <!-- Contact URL -->
        <label for="contact_url">Contact URL:</label>
        <input type="text" id="contact_url" name="contact_url" value="{{ old('contact_url', $profile->contact_url) }}">

        <!-- Contact LinkedIn -->
        <label for="contact_LinkedIn">Contact LinkedIn:</label>
        <input type="text" id="contact_LinkedIn" name="contact_LinkedIn" value="{{ old('contact_LinkedIn', $profile->contact_LinkedIn) }}">

        <!-- Has LIA -->
        <label for="has_LIA">Has LIA:</label>
        <input type="checkbox" id="has_LIA" name="has_LIA" {{ $profile->has_LIA ? 'checked' : '' }}>
        
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

        <button type="submit">Spara din profil</button>
    </form>

    @foreach ($questions as $question)
    <div class="question">
        <p>{{ $question->question }}</p>
        <p>Answer: {{ $question->chosen_option == 'option_one' ? $question->option_one : $question->option_two }}</p>
    </div>
    @endforeach
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @else
    <!-- Display static profile content. Maybe use different layout sections?? -->
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