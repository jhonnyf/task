<div class="checklist mb-3" data-id="{{ $checklist->id }}">
    <div class="d-flex justify-content-between checklist-title-section align-items-center mb-2">
        <div class="title-checklist d-flex align-items-center">
            <div class="icon me-2">
                <i class="fas fa-tasks"></i>
            </div>
            <h4 class="checklist-title focus-edit-content" data-type="checklist" data-element="checklist">{{ $checklist->checklist }}</h4>        
        </div>

        <div class="d-flex justify-content-between">
            @php
                $finished = $checklist->items()->where('finished', 1)->count();
            @endphp
            <div class="checklist-total-items">({{ $finished }}/{{ $checklist->items()->count() }})</div>
            <div id="column-dropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></div>
            <ul class="dropdown-menu" aria-labelledby="column-dropdown">            
                <li><a href="javascript:;" class="checklist-destroy"><i class="far fa-trash-alt"></i> Excluir</a></li>
            </ul>
        </div>
    </div>
    <div class="list-checklist-items mb-2" id="sortable-checklist-{{ $checklist->id }}">        
        @if ($checklist->items()->count() > 0)            
            @foreach ($checklist->items as $item)
                <x-checklist-item  :checklistItem="$item"/>
            @endforeach            
        @endif        
    </div>
    <p class="text-end">
        <a href="javascript:;" class="btn btn-dark checklist-item-store">Novo item</a>
    </p>    
</div>