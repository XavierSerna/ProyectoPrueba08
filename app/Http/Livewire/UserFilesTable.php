<?php

namespace App\Http\Livewire;

use App\Models\UserFile;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class UserFilesTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return UserFile::query();
    }

    protected function getTableColumns(): array 
    {
        return [
            Tables\Columns\TextColumn::make('id')->label('ID'),
            Tables\Columns\TextColumn::make('user_id')->label('User ID'),
            Tables\Columns\TextColumn::make('file_name')->label('File Name'),
            Tables\Columns\TextColumn::make('file_path')->label('File Path'),

            Tables\Columns\BooleanColumn::make('is_public')->label('Is Public'),
            Tables\Columns\TextColumn::make('allowed_user_ids')->label('Allowed User IDs'),
            Tables\Columns\TextColumn::make('categories')->label('Categories'),
            Tables\Columns\TextColumn::make('upload')->label('Upload'),
            Tables\Columns\TextColumn::make('description')->label('Description'),
            Tables\Columns\TextColumn::make('public_key')->label('Public Key'),
            Tables\Columns\TextColumn::make('tags')->label('Tags'),
            Tables\Columns\BooleanColumn::make('fav')->label('Favorite'),
        ];
    }

    public function render(): View
    {
        return view('livewire.user-files-table');
    }
}
