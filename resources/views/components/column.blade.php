<div class="column column-{{ $column->id }}" data-id="{{ $column->id }}">
    <div class="column-header">
        <h3 class="column-title">{{ $column->column }}</h3>

        <div class="dropdown column-actions">
            <div class="column-menu" id="column-dropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></div>
            <ul class="dropdown-menu" aria-labelledby="column-dropdown">
                <li><a class="dropdown-item" href="#"><i class="fas fa-copy"></i> Clonar</a></a></li>                
                <li><a class="dropdown-item link-ajax delete" href="{{ route('column.destroy', ['column_id' => $column->id]) }}"><i class="fas fa-trash"></i> Arquivar</a></a></li>
            </ul>
        </div>
    </div>    

    <div id="sortable-cards-{{ $column->id }}" data-column_id="{{ $column->id }}" class="cards">
        @if ($column->cards()->count() > 0)
            @foreach ($column->cards as $card)
                <x-card :card="$card" />                                                
            @endforeach
        @endif
    </div>
    <form action="{{ route('card.store', ['column_id' => $column->id]) }}" method="post" class="form form-ajax form-new-card" autocomplete="off">
        <div class="form-field">
            <input type="text" class="form-control" name="card" placeholder="Adicione o título para o seu card" required>
        </div>

        <div class="text-end mt-2">
            <button class="btn btn-dark">ENVIAR</button>
        </div>        
    </form>
</div>    