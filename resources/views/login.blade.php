<div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email" id="email">Email</label>
        <input type="email" name="email">
        <label for="password" id="password">Lösenord</label>
        <input type="password" name="password">
        <button type="submit">Logga in</button>
    </form>
</div>
<div>
    @if ($errors->any())
    <div class="error-container">
        @foreach ($errors->all() as $error)
            <p class="error">    
            {{ $error }}
            </p>
        @endforeach
    @endif
</div>