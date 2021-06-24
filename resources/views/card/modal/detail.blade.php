@extends('layout.modal')

@section('content')
    <div class="card-detail card-{{ $Card->id }}" data-id="{{ $Card->id }}">
        <div class="container-fluid">
            <div class="mb-3 ps-2 pe-2">
                <h3 class="title focus-edit-content" data-type="card" data-element="card">{{ $Card->card }}</h3>
            </div>
            
            <div class="mb-3 ps-2 pe-2">
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

            <div class="mb-3 ps-2 pe-2">
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

                    <div class="ps-2 pe-2">
                        <h4 class="title-section mb-3"><i class="fas fa-align-justify"></i> Descrição</h4>
                        <div class="pe-2">
                            <textarea name="description" id="description" class="form-control save-blur" rows="5" placeholder="Digite aqui uma descrição detalhada para o seu card">{{ $Card->description }}</textarea>
                        </div>
                    </div>

                    <div class="mt-3 list-checklists">
                        @if ($Card->checklists->count() > 0)                        
                            @foreach ($Card->checklists as $checklist)
                                <x-checklist :checklist="$checklist" />
                            @endforeach                            
                        @endif
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <div class="pe-2">

                        <div class="mb-3">
                            <h4 class="title-section mb-3"><i class="fas fa-cogs"></i> Ações</h4>
                            <div class="actions">
                                @if ($Card->column->board->team->count() > 0)
                                    <button type="button" class="mb-2 btn btn-dark act-join-card" data-card_id="{{ $Card->id }}" data-user_id="{{ Auth::user()->id }}"><i class="fas fa-users"></i> Ingressar</button>
                                    <button type="button" class="mb-2 btn btn-dark act-members-teams"><i class="fas fa-users"></i> Membros</button>
                                    <div class="members-teams">
                                        <div class="card-users">
                                            @foreach ($Card->column->board->team as $team)
                                                @foreach ($team->users as $user)
                                                    <div class="card-user mb-2 me-2 act-join-card" data-url="{{ route('card.join-card', ['card_id' => $Card->id]) }}" data-card_id="{{ $Card->id }}" data-user_id="{{ $user->id }}" title="{{ $user->first_name }} {{ $user->last_name }}">
                                                        {{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <button type="button" class="mb-2 btn btn-dark checklist-store"><i class="fas fa-tasks"></i> Checklist</button>
                                <button type="button" class="mb-2 btn btn-dark open-tags"><i class="fas fa-tags"></i> Tags</button>
                                <div class="dropdown-tags">
                                    <div class="tags-created mb-2">
                                        @foreach ($Card->column->board->tags as $tag)
                                            <div class="tag-item add-tag mb-2" data-tag_id="{{ $tag->id }}" data-card_id="{{ $Card->id }}"><span style="background-color: {{ $tag->color }}" class="me-2"></span>{{ $tag->tag }}</div>
                                        @endforeach
                                    </div>
                                    <input type="text" name="tag" class="form-control form-control-sm mb-2" id="tag-name" placeholder="Tag" autocomplete="off">
                                    <div class="colors mb-2">
                                        <input type="color" name="color-custom" class="form-control form-control-color" value="#800080">
                                    </div>
                                    <button type="button" class="btn btn-dark save-tag" data-card_id="{{ $Card->id }}">Criar tag</button>
                                </div>                        
                            </div>
                        </div>

                        <h4 class="title-section mb-3"><i class="fas fa-users"></i> Usuários</h4>
                        <x-carduser :card="$Card" />                    

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection