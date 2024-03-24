<div>
    @foreach ($users as $user)
    <p>
        <a href="{{ route('profile.show', ['id' => $user->id]) }}">
            {{ $user->companyName }}
        </a>
    </p>
    @endforeach
</div>
