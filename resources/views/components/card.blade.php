<div class="card" data-id="{{ $card->id }}">
    <h4><a href="javascript:;" data-modal="{{ route('card.detail', ['card_id' => $card->id]) }}">{{ $card->card }}</a></h4>
</div>