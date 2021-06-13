<div class="checklist-item" data-id="{{ $checklistItem->id }}">
       
    <div class="checklist-item-content">
        <div class="me-2">
            <input type="checkbox" name="finished" value="1" class="checklist-item-finished" {{ $checklistItem->finished === 1 ? 'checked' : '' }}>
        </div>
        
        <div class="focus-edit-content checklist-item-text" data-type="checklist-item" data-element="checklist_item">
            {{ $checklistItem->checklist_item }}
        </div>
    </div>

    <div class="dropdown">
        <button type="button" id="dropdown-{{ $checklistItem->id }}" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdown-{{ $checklistItem->id }}">                
            <li><a href="javascript:;" class="dropdown-item"><i class="far fa-trash-alt"></i> Excluir</a></li>
        </ul>
    </div>
    
</div>