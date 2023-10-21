<?php

namespace App\Filament\Resources\PacienteResource\Pages;

use App\Filament\Resources\PacienteResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditPaciente extends EditRecord
{
    protected static string $resource = PacienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()
            ->label('Visualizar'),
            Actions\DeleteAction::make()
            ->label('Deletar'),
        ];
    }
    // protected function beforeSave(): void
    // {
    //    Notification::make()
    //     ->title('Novo paciente cadastrado')
    //     ->sendToDatabase(auth()->user());
    // }
//     protected function getSavedNotification(): ?Notification
// {
//     return Notification::make()
//         ->success()
//         ->title('Paciente Atualizado')
//         ->body('Novo paciente atualizado no banco de dados')
//         ->sendToDatabase(User::all());
// }

}
