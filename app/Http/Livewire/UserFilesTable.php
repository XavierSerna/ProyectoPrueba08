<?php

namespace App\Http\Livewire;

use App\Models\UserFile;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;

use Illuminate\Support\HtmlString;

class UserFilesTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $folderId;

    protected function getTableQuery(): Builder
    {
        // when folderid is no null / when is null
        return UserFile::query()->when($this->folderId, 
        function ($query) { return $query->where('parent_id', $this->folderId); }, //parentid = folderid
        function ($query) { return $query->whereNull('parent_id'); } //parentid = null
        );
    }

    protected function getTableColumns(): array 
    {//file folder name, size, type, count of files if folder, upload date, update date
        return [
            TextColumn::make('id')
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('file_name')
            ->sortable()
            ->searchable()
            ->label('Name')
            ->formatStateUsing(function ($state, $record) { //estado y registro actual de cada valor file_name
                if ($record->type === 'folder') { // if this file is folder type
                    return new HtmlString('<a class="p-2 rounded bg-blue-100 text-blue-600 cursor-pointer" href="#" wire:click.prevent="viewFolder(' . $record->id . ')">' . $state . '</a>'); // defines the click and viewFolder function receives an id
                }
                return $state; //if its not a folder
            }),

            TextColumn::make('size')
            ->sortable()
            ->searchable()
            ->toggleable(),
            TextColumn::make('type')
            ->sortable()
            ->searchable()
            ->toggleable(),
            TextColumn::make('file_count')
            ->sortable()
            ->searchable()
            ->label('# of files')
            ->toggleable(),
            TextColumn::make('created_at')
            ->sortable()
            ->searchable()
            ->label('Upload date')
            ->dateTime('Y M d H:i:s'),
            TextColumn::make('updated_at')
            ->sortable()
            ->searchable()
            ->label('Update date')
            //->date('Y M d')
            ->toggleable(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Filter::make('file_name')
            ->query(fn (Builder $query): Builder => $query->where('file_name', true))
            ->label('Name'),
            Filter::make('type')
            ->query(fn (Builder $query): Builder => $query->where('type', true))
            ->label('Type'),
        ];
    }

    public function viewFolder($folderId)
    {
        $this->folderId = $folderId; // updates table
    }

    public function viewParent()
    {
        $this->folderId = null; // updates table
    }

    public function render(): View
    {
        return view('livewire.user-files-table');
    }
}
