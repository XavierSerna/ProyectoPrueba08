<div>
    @if($this->folderId)
        <button wire:click="viewParent">Back to <-</button>
    @endif

    {{ $this->table }}
</div>
