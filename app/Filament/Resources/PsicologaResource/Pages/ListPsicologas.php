<?php

namespace App\Filament\Resources\PsicologaResource\Pages;

use App\Filament\Resources\PsicologaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPsicologas extends ListRecords
{
    protected static string $resource = PsicologaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Nova Consulta'),
        ];
    }
}
