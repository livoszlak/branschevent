<section>
    <h3>Hello user</h3>
    <p>here u can change your profile blablabla</p>

    @if ($editable)
    <!-- Display editable form fields if user is visiting their own profile -->
    <form method="POST" action="{{ route('profile.update', ['id' => $profile->id]) }}">
        @csrf
        @method('PUT')
        <!-- form fields, bla bla -->
        <button type="submit">Spara profil</button>
    </form>
    @else
    <!-- Display static profile content. Maybe use different layout sections?? -->
    @endif
</section>