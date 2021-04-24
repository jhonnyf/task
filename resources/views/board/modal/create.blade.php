@extends('layout.modal')

@section('content')
    <form action="{{ route('board.store') }}" class="form form-ajax" method="post" autocomplete="off">
        @if (is_null($team_id) === false)
            <input type="hidden" name="team_id" value="{{ $team_id }}">
        @endif

        <div class="form-field">
            <input type="text" class="input" name="board" id="board" placeholder="Adicionar título do quadro" required>
        </div>

        <div class="text-right">
            <button class="btn">ENVIAR</button>
        </div>        
    </form>
@endsection