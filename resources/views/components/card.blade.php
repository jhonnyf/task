<div class="card card-{{ $card->id }}" data-id="{{ $card->id }}">
    <div class="tags">
        @if ($card->tags()->count() > 0)                    
            @foreach ($card->tags as $tag)
                <x-tag :tag="$tag" :card="$card" />
            @endforeach
        @endif
    </div>
    <h4><a href="javascript:;" data-modal="{{ route('card.detail', ['card_id' => $card->id]) }}">{{ $card->card }}</a></h4>
</div>