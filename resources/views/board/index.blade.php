@extends('main')

@section('content')
    <div class="container board-list">
        <div class="row">
            <div class="col-md-3 section-menu">
                <ul class="board-menu">
                    <li><a href="javascript:;">Quadros</a></li>
                    <li><a href="javascript:;">Logs</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="boards">
                    <div class="mb-3">
                        <h2 class="board-title">Meus quadros</h2>
                        <div class="itens">
                            @foreach ($boards as $board)
                                <div class="board">
                                    <a href="{{ route('board.detail', ['id' => $board->id]) }}">{{ $board->board }}</a>
                                </div>    
                            @endforeach
                            <div class="board">
                                <a href="javascript:;" data-modal="{{ route('board.create') }}">Criar novo quadro</a>
                            </div>
                        </div>
                    </div>

                    @if ($teams->count() > 0)
                        @foreach ($teams as $team)
                            <div class="mb-3">
                                <h2 class="board-title">{{ $team->team }}</h2>
                                <div class="itens">
                                    @foreach ($team->boards as $board)
                                        <div class="board">
                                            <a href="{{ route('board.detail', ['id' => $board->id]) }}">{{ $board->board }}</a>
                                        </div>    
                                    @endforeach
                                    <div class="board">
                                        <a href="javascript:;" data-modal="{{ route('board.create', ['team_id' => $team->id]) }}">Criar novo quadro</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>    
@endsection