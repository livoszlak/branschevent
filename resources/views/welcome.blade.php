<div class="landingpageWrapper">
    <h1>Välkommen till vårat event</h1>
    <section>
        <p>Detta är ett event för YRGO där Studenter och Företag kan networka och knyta kontakter! <br>
        blafjanefablablablablabla</p>
    </section>
    <form method="POST" action="{{ route('register') }}">
        @csrf
    
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
    
        <div>
            <h3>This will generate a password for you to login into your user/company profile page.</h3>
        </div>
    
        <button type="submit">Register</button>
    </form>
    
</div>