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

            <div class="tags">
                @if ($Card->tags()->count() > 0)                    
                    @foreach ($Card->tags as $tag)
                        <x-tag :tag="$tag" />
                    @endforeach
                @endif
            </div>

            <div class="row">
                <div class="col-md-9">
                    <h4 class="title-section">Descrição</h4>
                    <textarea name="description" id="description" class="input save-blur" rows="5" placeholder="Digite aqui uma descrição detalhada para o seu card">{{ $Card->description }}</textarea>
                </div>
                <div class="col-md-3">
                    <h4 class="title-section">Ações</h4>
                    <button class="btn">Membros</button>
                    <button type="button" class="btn">Tags</button>
                    <div class="dropdown-tags">
                        <input type="text" name="tag" class="input" id="tag-name" placeholder="Tag">
                        <div class="colors">
                            <input type="radio" class="btn-check input-tag-color" value="#198754" name="tag-color" id="tag-sucess">
                            <label class="btn color btn-secondary bg-success" for="tag-sucess"></label>

                            <input type="radio" class="btn-check input-tag-color" value="#ffc107" name="tag-color" id="tag-warning">
                            <label class="btn color btn-secondary bg-warning" for="tag-warning"></label>

                            <input type="radio" class="btn-check input-tag-color" value="#dc3545" name="tag-color" id="tag-danger">
                            <label class="btn color btn-secondary bg-danger" for="tag-danger"></label>

                            <input type="radio" class="btn-check input-tag-color" value="#0d6efd" name="tag-color" id="tag-primary">
                            <label class="btn color btn-secondary bg-primary" for="tag-primary"></label>
                        </div>
                        <button type="button" class="btn save-tag" data-card_id="{{ $Card->id }}">Criar tag</button>
                    </div>
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