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
//use Filament\Forms\Components\TextInput;

//use Filament\Tables\Actions\Action;

class UserFilesTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return UserFile::query()->whereNull('parent_id');
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
            ->label('Name'),
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
/*             Filter::make('file_name')
            ->form([
                TextInput::make('file_name')
                    ->placeholder('File Name'),
            ])
            ->query(fn (Builder $query, array $data): Builder => $query->where('file_name', 'like', '%' . $data['file_name'] . '%'))
            ->label('Name'), */

            Filter::make('file_name')
            ->query(fn (Builder $query): Builder => $query->where('file_name', true))
            ->label('Name'),
            Filter::make('type')
            ->query(fn (Builder $query): Builder => $query->where('type', true))
            ->label('Type'),
        ];
    }

/*     protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->url(fn (UserFile $record): string => route('posts.edit', $record))
                ->openUrlInNewTab()
        ];
    } */

    public function render(): View
    {
        return view('livewire.user-files-table');
    }
}
