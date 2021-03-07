<div class="checklist-item" data-id="{{ $checklistItem->id }}">
    <div class="d-flex justify-content-between align-items-start">
        <div class="d-flex align-items-start checklist-item-content">
            <input type="checkbox" name="finished" value="1" class="checklist-item-finished" {{ $checklistItem->finished === 1 ? 'checked' : '' }}>
            <div class="focus-edit-content" data-type="checklist-item" data-element="checklist_item">{{ $checklistItem->checklist_item }}</div>
        </div>
        <a href="javascript:;" class="checklist-item-destroy"><i class="far fa-trash-alt"></i></a>
    </div>
</div>