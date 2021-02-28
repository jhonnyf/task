@extends('layout.modal')

@section('content')
    <div class="card-detail">
        <div class="container-fluid">
            <h3 class="title">{{ $Card->card }}</h3>
            <div class="row">
                <div class="col-md-9">
                    <h4 class="title-section">Descrição</h4>
                    <textarea name="description" id="description" class="input" cols="30" rows="10" placeholder="Digite aqui uma descrição detalhada para o seu card"></textarea>
                </div>
                <div class="col-md-3">
                    <h4 class="title-section">Ações</h4>
                    <button class="btn">Membros</button>
                    <button class="btn">Etiquetas</button>
                    <button class="btn">Checklist</button>
                    <button class="btn">Data de entrega</button>
                </div>
            </div>
        </div>
    </div>
@endsection