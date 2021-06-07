@extends('main')

@section('content')
    <div class="container-fluid mt-1">
        <div class="board-detail">

            <div class="header-board">
                <h2 class="title">{{ $Board->board }}</h2>
                <div class="row">
                    <div class="col-md-3">
                        <form action="{{ route('column.store', ['board_id' => $Board->id]) }}" method="post" class="form form-ajax form-new-column" autocomplete="off">                               
                            <div class="input-group">
                                <input type="text" class="form-control" name="column" id="column" placeholder="Adicione o título da coluna" required>                                
                                <button class="btn btn-dark">ENVIAR</button>
                            </div>
                        </form>
                    </div>
                </div>                           
            </div>
            
            <div class="columns">                        
                <div id="sortable-columns" class="columns-board" data-board_id="{{ $Board->id }}">
                    @if ($Board->columns->count() > 0)
                        @foreach ($Board->columns as $column)
                            <x-column :column="$column" />  
                        @endforeach
                    @endif
                </div>
            </div>
            
        </div>
    </div>
@endsection