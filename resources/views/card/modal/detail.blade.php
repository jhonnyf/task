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

            @if ($Card->tags()->count() > 0)
                <div class="tags">
                    @foreach ($Card->tags as $tag)
                        <div class="tag" style="background-color: {{ $tag->color }}">{{ $tag->tag }}</div>
                    @endforeach
                </div>
            @endif

            <div class="row">
                <div class="col-md-9">
                    <h4 class="title-section">Descrição</h4>
                    <textarea name="description" id="description" class="input save-blur" rows="5" placeholder="Digite aqui uma descrição detalhada para o seu card">{{ $Card->description }}</textarea>
                </div>
                <div class="col-md-3">
                    <h4 class="title-section">Ações</h4>
                    <button class="btn">Membros</button>
                    <button type="button" class="btn dropdown-toggle" id="dropdown-tags" data-bs-toggle="dropdown" aria-expanded="false">Etiquetas</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdown-tags">
                        <li><a class="dropdown-item btn-add-tag" data-card_id="{{ $Card->id }}" data-color="#0d6efd" data-tag="Normal" href="javascript:;">Normal</a></li>
                        <li><a class="dropdown-item btn-add-tag" data-card_id="{{ $Card->id }}" data-color="#ffc107" data-tag="Médio" href="javascript:;">Médio</a></li>
                        <li><a class="dropdown-item btn-add-tag" data-card_id="{{ $Card->id }}" data-color="#dc3545" data-tag="Urgente" href="javascript:;">Urgente</a></li>
                      </ul>
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