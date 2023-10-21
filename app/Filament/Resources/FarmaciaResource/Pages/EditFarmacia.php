<?php

namespace App\Filament\Resources\FarmaciaResource\Pages;

use App\Filament\Resources\FarmaciaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFarmacia extends EditRecord
{
    protected static string $resource = FarmaciaResource::class;

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
