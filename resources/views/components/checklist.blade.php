<div class="checklist mb-3" data-id="{{ $checklist->id }}">
    <div class="d-flex justify-content-between checklist-title-section">
        <h4 class="checklist-title mb-2 focus-edit-content" data-type="checklist" data-element="checklist"><i class="fas fa-tasks"></i> {{ $checklist->checklist }}</h4>        
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
    <div class="list-checklist-items" id="sortable-checklist-{{ $checklist->id }}">        
        @if ($checklist->items()->count() > 0)            
            @foreach ($checklist->items as $item)
                <x-checklist-item  :checklistItem="$item"/>
            @endforeach            
        @endif        
    </div>
    <a href="javascript:;" class="checklist-item-store">Novo item</a>
</div>