<div>
    @if($this->folderId)
        <button wire:click="viewParent" class="p-2 m-3 bg-blue-500 text-white rounded hover:bg-blue-600"><-Go back</button>
    @endif

    {{ $this->table }}
</div>