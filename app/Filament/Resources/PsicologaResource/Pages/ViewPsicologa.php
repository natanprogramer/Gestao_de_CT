<?php

namespace App\Filament\Resources\PsicologaResource\Pages;

use App\Filament\Resources\PsicologaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPsicologa extends ViewRecord
{
    protected static string $resource = PsicologaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
