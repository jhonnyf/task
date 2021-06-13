@extends('layout.modal')

@section('content')
    <div class="card-detail card-{{ $Card->id }}" data-id="{{ $Card->id }}">
        <div class="container-fluid">
            <h3 class="mb-3 title focus-edit-content" data-type="card" data-element="card">{{ $Card->card }}</h3>
            
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Data de cadastro:</label> 
                        <input type="datetime-local" value="{{ str_replace(' ', 'T', $Card->created_at) }}" class="form-control" readonly>
                    </div>
                    <div class="col">
                        <label class="form-label">Data de entrega:</label>                         
                        <input type="datetime-local" name="final_date" class="form-control save-blur" min="{{ str_replace(' ', 'T', date('Y-m-d H:i', strtotime($Card->created_at))) }}" value="{{ str_replace(' ', 'T', $Card->final_date) }}">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <h4 class="title-section mb-3"><i class="fas fa-tags"></i> Tags</h4>
                <div class="tags">
                    @if ($Card->tags()->count() > 0)                    
                        @foreach ($Card->tags as $tag)
                            <x-tag :tag="$tag" :card="$Card" />
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <h4 class="title-section mb-3"><i class="fas fa-align-justify"></i> Descrição</h4>
                    <textarea name="description" id="description" class="form-control save-blur" rows="5" placeholder="Digite aqui uma descrição detalhada para o seu card">{{ $Card->description }}</textarea>
                </div>
                <div class="col-md-3">
                    <h4 class="title-section mb-3"><i class="fas fa-cogs"></i> Ações</h4>
                    <div class="actions">
                        <button type="button" class="mb-2 btn btn-dark act-join-card" data-card_id="{{ $Card->id }}" data-user_id="{{ Auth::user()->id }}"><i class="fas fa-users"></i> Ingressar</button>
                        <button type="button" class="mb-2 btn btn-dark"><i class="fas fa-users"></i> Membros</button>
                        <button type="button" class="mb-2 btn btn-dark checklist-store"><i class="fas fa-tasks"></i> Checklist</button>
                        <button type="button" class="mb-2 btn btn-dark open-tags"><i class="fas fa-tags"></i> Tags</button>
                        <div class="dropdown-tags">
                            <input type="text" name="tag" class="input" id="tag-name" placeholder="Tag">
                            <div class="colors">
                                <input type="color" name="color-custom" class="color-custom" value="#800080">
                            </div>
                            <button type="button" class="btn btn-dark save-tag" data-card_id="{{ $Card->id }}">Criar tag</button>
                        </div>
                        
                    </div>
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