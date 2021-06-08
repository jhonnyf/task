<div class="checklist-item" data-id="{{ $checklistItem->id }}">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center checklist-item-content">
            <input type="checkbox" name="finished" value="1" class="checklist-item-finished" {{ $checklistItem->finished === 1 ? 'checked' : '' }}>
            <div class="focus-edit-content checklist-item-text" data-type="checklist-item" data-element="checklist_item">{{ $checklistItem->checklist_item }}</div>
        </div>
        <div id="column-dropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></div>
        <ul class="dropdown-menu" aria-labelledby="column-dropdown">            
            <li><a href="javascript:;" class="checklist-item-destroy"><i class="far fa-trash-alt"></i> Excluir</a></li>
        </ul>
    </div>
</div>