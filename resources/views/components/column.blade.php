<div class="column column-{{ $column->id }}" data-id="{{ $column->id }}">
    <div class="column-header">
        <div class="column-title">
            <h3>{{ $column->column }}</h3>
        </div>
        <div class="column-actions dropdown">
            <div class="column-menu dropdown-toggle">
                <i class="fas fa-ellipsis-v"></i>
            </div>
            <div class="dropdown-content">
                <h4 class="title">Ações</h4>
                <div class="separator"></div>
                <ul>
                    <li><a href="javascript:;"><i class="fas fa-copy"></i> Clonar</a></li>
                    <li><a href="javascript:;" class="delete"><i class="fas fa-trash"></i> Arquivar</a></li>
                </ul>
            </div>
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
            <input type="text" class="input" name="card" id="card" placeholder="Adicione o título para o seu card" required>
        </div>

        <div class="text-right">
            <button class="btn">ENVIAR</button>
        </div>        
    </form>
</div>    