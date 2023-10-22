<?php

namespace App\Filament\Resources\PacienteResource\Pages;

use App\Filament\Resources\PacienteResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Actions as ComponentsActions;
use Filament\Resources\Pages\ListRecords;

class ListPacientes extends ListRecords
{
    protected static string $resource = PacienteResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Actions\CreateAction::make()
            ->label('Contatos PDF')
            ->url(route('contato_pdf')),
            Actions\CreateAction::make()
            ->label('Lista de Chamadas PDF')
            ->url(route('lista_chamadas_pdf')),
            Actions\CreateAction::make()
            ->label('Novo Paciente'),


        ];
    }
}
