<?php

namespace App\Filament\Resources\CheckListResource\Pages;

use App\Filament\Resources\CheckListResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCheckList extends ViewRecord
{
    protected static string $resource = CheckListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
            ->label('Editar'),
        ];
    }
}
