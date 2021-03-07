@extends('layout.modal')

@section('content')
    <div class="card-detail" data-id="{{ $Card->id }}">
        <div class="container-fluid">
            <h3 class="title focus-edit-content" data-type="card" data-element="card">{{ $Card->card }}</h3>
            
            <div class="row section-date">
                <div class="col">
                    <span>Data de cadastro:</span> 
                    <input type="datetime-local" value="{{ str_replace(' ', 'T', $Card->created_at) }}" class="input" readonly>
                </div>
                <div class="col">
                    <span>Data de entrega:</span> 
                    <input type="datetime-local" name="final_date" value="{{ str_replace(' ', 'T', $Card->final_date) }}" class="input save-blur">
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <h4 class="title-section">Descrição</h4>
                    <textarea name="description" id="description" class="input save-blur" rows="5" placeholder="Digite aqui uma descrição detalhada para o seu card">{{ $Card->description }}</textarea>
                </div>
                <div class="col-md-3">
                    <h4 class="title-section">Ações</h4>
                    <button class="btn">Membros</button>
                    <button class="btn">Etiquetas</button>
                    <button class="btn checklist-store">Checklist</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 list-checklists">
                    @if ($Card->checklists->count() > 0)                        
                        @foreach ($Card->checklists as $checklist)
                            <x-checklist :checklist="$checklist" />
                        @endforeach                            
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection