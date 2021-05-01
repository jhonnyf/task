@extends('layout.modal')

@section('content')
    <div class="card-detail card-{{ $Card->id }}" data-id="{{ $Card->id }}">
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

            <h4 class="title-section"><i class="fas fa-tags"></i> Tags</h4>
            <div class="tags">
                @if ($Card->tags()->count() > 0)                    
                    @foreach ($Card->tags as $tag)
                        <x-tag :tag="$tag" />
                    @endforeach
                @endif
            </div>

            <div class="row">
                <div class="col-md-9">
                    <h4 class="title-section"><i class="fas fa-align-justify"></i> Descrição</h4>
                    <textarea name="description" id="description" class="input save-blur" rows="5" placeholder="Digite aqui uma descrição detalhada para o seu card">{{ $Card->description }}</textarea>
                </div>
                <div class="col-md-3">
                    <h4 class="title-section"><i class="fas fa-cogs"></i> Ações</h4>
                    <button type="button" class="btn-actions btn act-join-card" data-card_id="{{ $Card->id }}" data-user_id="{{ Auth::user()->id }}"><i class="fas fa-users"></i> Ingressar</button>
                    <button type="button" class="btn-actions btn"><i class="fas fa-users"></i> Membros</button>
                    <button type="button" class="btn-actions btn open-tags"><i class="fas fa-tags"></i> Tags</button>
                    <div class="dropdown-tags">
                        <input type="text" name="tag" class="input" id="tag-name" placeholder="Tag">
                        <div class="colors">
                            <input type="color" name="color-custom" class="color-custom" value="#800080">
                        </div>
                        <button type="button" class="btn save-tag" data-card_id="{{ $Card->id }}">Criar tag</button>
                    </div>
                    <button class="btn-actions btn checklist-store"><i class="fas fa-tasks"></i> Checklist</button>
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