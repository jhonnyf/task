<div class="card-users card-members">
    @if ($card->users->count() > 0)
        @foreach ($card->users as $user)
            <div class="card-user mb-2 me-2 act-exit-card" data-url="{{ route('card.exit-card', ['card_id' => $card->id]) }}" data-user_id="{{ $user->id }}" title="{{ $user->first_name }} {{ $user->last_name }}">            
                {{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}
            </div>
        @endforeach
    @endif
</div>