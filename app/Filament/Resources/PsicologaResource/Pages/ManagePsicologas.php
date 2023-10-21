<?php

namespace App\Filament\Resources\PsicologaResource\Pages;

use App\Filament\Resources\PsicologaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePsicologas extends ManageRecords
{
    protected static string $resource = PsicologaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Novo Atendimento'),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
