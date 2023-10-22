<?php

namespace App\Filament\Resources\PsicologaResource\Pages;

use App\Filament\Resources\PsicologaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPsicologa extends EditRecord
{
    protected static string $resource = PsicologaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
