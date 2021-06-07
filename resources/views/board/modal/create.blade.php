@extends('layout.modal')

@section('content')
    <form action="{{ route('board.store') }}" class="form form-ajax" method="post" autocomplete="off">
        @if (is_null($team_id) === false)
            <input type="hidden" name="team_id" value="{{ $team_id }}">
        @endif

        <div class="input-group">
            <input type="text" class="form-control" name="board" id="board" placeholder="Adicionar título do quadro" required>
            <button type="submit" class="btn btn-dark">ENVIAR</button>
        </div>        
    </form>
@endsection