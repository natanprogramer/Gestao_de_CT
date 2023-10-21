<?php

namespace App\Filament\Resources\CheckListResource\Pages;

use App\Filament\Resources\CheckListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCheckList extends EditRecord
{
    protected static string $resource = CheckListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()
            ->label('Visualizar'),
            Actions\DeleteAction::make()
            ->label('Deletar'),
        ];
    }
}
