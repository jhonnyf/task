<div class="checklist" data-id="{{ $checklist->id }}">
    <div class="d-flex justify-content-between">
        <h4 class="title-section focus-edit-content" data-type="checklist" data-element="checklist">{{ $checklist->checklist }}</h4>
        <a href="javascript:;" class="checklist-destroy"><i class="far fa-trash-alt"></i></a>
    </div>
    <div class="list-checklist-items">        
        @if ($checklist->items()->count() > 0)            
            @foreach ($checklist->items as $item)
                <x-checklist-item  :checklistItem="$item"/>
            @endforeach            
        @endif        
    </div>
    <a href="javascript:;" class="checklist-item-store">Novo item</a>
</div>