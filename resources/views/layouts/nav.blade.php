<div class="navWrapper">
        <a href="{{ url('/attendees') }}" class="navButton {{ Request::is('attendees') ? 'active' : '' }}">VEM KOMMER?</a>
        <a href="{{ Auth::user() ?  route('profile.show', ['id' => Auth::user()->id]) : url('/login') }}" class="navButton {{ Request::is('profile/*') ? 'active' : '' }} {{ Request::is('login') ? 'active' : '' }}">DIN ANMÄLAN</a>
    </div>