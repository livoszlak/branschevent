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