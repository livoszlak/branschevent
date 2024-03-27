@extends('layouts.app')

<section>
    <h3>Hello user</h3>
    <p>here u can change your profile blablabla</p>

    @if ($editable)
    <!-- Display editable form fields if user is visiting their own profile -->
    <form method="POST" action="{{ route('profile.update', ['profile' => $profile->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <img src="{{ asset('storage/profile_images/' . $profile->profile_image) }}">
        <!-- Profile image -->
        <label for="profile_image">Profile image:</label>
        <input type="file" id="profile_image" name="profile_image" accept="image/png, image/jpeg, image/jpg, image/svg">

        <!-- Street Name -->
        <label for="street_name">Street Name:</label>
        <input type="text" id="street_name" name="street_name" value="{{ old('street_name', $profile->street_name) }}">
    
        <!-- Post Code -->
        <label for="post_code">Post Code:</label>
        <input type="text" id="post_code" name="post_code" value="{{ old('post_code', $profile->post_code) }}">

        <!-- City -->
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="{{ old('city', $profile->city) }}">
        
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
                <li>{{ $tag->tag_name }}</li>
            @endforeach
        </ul>

        <!-- About -->
        <label for="about">About:</label>
        <textarea id="about" name="about">{{ old('about', $profile->about) }}</textarea>
    
        <button type="submit">Save Profile</button>
    </form>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    
    @else
    <!-- Display static profile content. Maybe use different layout sections?? -->
    @endif

</section>