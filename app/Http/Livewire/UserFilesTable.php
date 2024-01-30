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
/* 
            //Tables\Columns\TextColumn::make('id')->label('ID'),
            //Tables\Columns\TextColumn::make('user_id')->label('User ID'),
            Tables\Columns\TextColumn::make('file_name')->label('File Name')->searchable()->sortable(),

            //Tables\Columns\TextColumn::make('file_path')->label('File Path'),
            Tables\Columns\TextColumn::make('size')->label('Size')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('type')->label('Type'),
            Tables\Columns\TextColumn::make('file_count')->label('file_count'),
            //Tables\Columns\BooleanColumn::make('is_public')->label('Is Public'),
            //Tables\Columns\TextColumn::make('allowed_user_ids') ->label('Allowed User IDs'),
            //Tables\Columns\TextColumn::make('categories') ->label('Categories'),
            //Tables\Columns\TextColumn::make('upload') ->label('Upload'),
            //Tables\Columns\TextColumn::make('description')->label('Description'),
            //Tables\Columns\TextColumn::make('public_key')->label('Public Key'),
            //Tables\Columns\TextColumn::make('tags') ->label('Tags'),
            //Tables\Columns\BooleanColumn::make('fav')->label('Favorite'),

            Tables\Columns\TextColumn::make('created_at') ->label('Upload Date'),
            Tables\Columns\TextColumn::make('updated_at') ->label('Update Date'),
             */
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
