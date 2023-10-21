<?php

namespace App\Filament\Resources\FarmaciaResource\Pages;

use App\Filament\Resources\FarmaciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFarmacias extends ListRecords
{
    protected static string $resource = FarmaciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Novo Cadastro'),
        ];
    }
}
