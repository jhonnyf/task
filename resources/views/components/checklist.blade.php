<div class="checklist" data-id="{{ $checklist->id }}">
    <h4 class="title-section">{{ $checklist->checklist }}</h4>
    @if ($checklist->items()->count() > 0)
        <ul>
            @foreach ($checklist->items as $item)
                <li>{{ $item->checklist_item }}</li>
            @endforeach
        </ul>
    @endif
    <a href="javascript:;" class="generate-checklist-item">Novo item</a>
</div>