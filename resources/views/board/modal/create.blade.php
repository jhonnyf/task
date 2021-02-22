@extends('layout.modal')

@section('content')
    <form action="{{ route('board.store') }}" class="form form-ajax" method="post" autocomplete="off">

        <div class="form-field">
            <input type="text" class="input" name="title" id="title" placeholder="Adicionar título do quadro" required>
        </div>

        <div class="text-right">
            <button class="btn">ENVIAR</button>
        </div>        
    </form>
@endsection