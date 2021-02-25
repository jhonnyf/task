@extends('main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="board-detail">

                    <h2>{{ $Board->board }}</h2>
                    
                    <div class="columns">                        
                        @if ($Board->columns->count() > 0)
                            @foreach ($Board->columns as $column)
                                <div class="column">
                                    <h3>{{ $column->column }}</h3>
                                </div>      
                            @endforeach
                        @endif
                        
                        <div class="column">
                            <a href="javascript:;" class="new-column"><i class="fas fa-plus"></i> Adicionar nova coluna</a>
                            <form action="{{ route('column.store', ['board_id' => $Board->id]) }}" method="post" class="form form-ajax form-new-column" autocomplete="off">
                                <div class="form-field">
                                    <input type="text" class="input" name="column" id="column" placeholder="Adicione o título da coluna" required>
                                </div>
                        
                                <div class="text-right">
                                    <button class="btn">ENVIAR</button>
                                </div>        
                            </form>  
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection