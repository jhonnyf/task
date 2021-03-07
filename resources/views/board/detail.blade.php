@extends('main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="board-detail">

                    <div class="header-board">
                        <div class="title"><h2>{{ $Board->board }}</h2></div>
                        <div class="form">
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
                    
                    <div class="columns">                        
                        <div id="sortable-columns" class="columns-board" data-board_id="{{ $Board->id }}">
                            @if ($Board->columns->count() > 0)
                                @foreach ($Board->columns as $column)
                                    <x-column :column="$column" />  
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection