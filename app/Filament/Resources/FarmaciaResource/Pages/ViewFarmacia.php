<?php

namespace App\Filament\Resources\FarmaciaResource\Pages;

use App\Filament\Resources\FarmaciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFarmacia extends ViewRecord
{
    protected static string $resource = FarmaciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
