<div>
    <div class="tempNav">
        <ul>
            <li><a href="">Vilka kommer?</a></li>
            <li><a href="">Företagsprofil</a></li>
            <li><a href="">Logga in</a></li>
        </ul>
    </div>
    <h2>Lorem ipsum dolor sit amet consectetur. Tristique luctus faucibus ultricies cursus elementum.</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form group">    
            <label for="name">Företagsnamn</label>
            <input id="name" type="text" name="name" value=" {{ old('name') }}" required autocomplete="name" autofocus>
        </div>

        <div class="form group">
            <label for="contact_name">Contact Person</label>
            <input id="contact_name" type="text" name="contact_name" value=" {{ old('contact_name') }}" required autocomplete="contact_name" autofocus>
        </div>

        <div class="form-group">
            <p>Antal personer som deltar</p>
            <button class="-">-</button>
            <div class="personerAntal">
                <label for="antalPersoner">0</label>
                <input id="participant_count" type="number" name="participant_count" value=" {{ old('participant_count') }}" required autocomplete="participant_count" autofocus> {{-- personer som deltar value --}} 
            </div>
            <button class="+">+</button>
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
    
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" value="{{ old('password') }}" required autocomplete="password">
        </div>
    
        <button type="submit">RSVP</button>
    </form>
</div>

@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif