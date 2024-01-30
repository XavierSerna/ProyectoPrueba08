<?php

namespace App\Http\Livewire;

use App\Models\UserFile;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Filament\Tables\Columns\TextColumn;

class UserFilesTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return UserFile::query();
    }

    protected function getTableColumns(): array 
    {//file folder name, size, type, count of files if folder, upload date, update date
        return [
            TextColumn::make('file_name')
            ->sortable()
            ->searchable(),
            TextColumn::make('size')
            ->sortable()
            ->searchable(),
            TextColumn::make('type')
            ->sortable()
            ->searchable(),
            TextColumn::make('file_count')
            ->sortable()
            ->searchable(),
            TextColumn::make('created_at')
            ->sortable()
            ->searchable(),
            TextColumn::make('updated_at')
            ->sortable()
            ->searchable(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [

        ];
    }

    public function render(): View
    {
        return view('livewire.user-files-table');
    }
}
