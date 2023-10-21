<?php

namespace App\Observers;

use App\Models\Farmacia;
use App\Models\User;
use App\Models\Paciente;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;


class FarmaciaObserver
{
    /**
     * Handle the Farmacia "created" event.
     */
    public function created(Farmacia $farmacia): void
    {
        Notification::make()
            ->warning()
            ->title('Novo medicamento do Paciente ' . $farmacia->paciente['primeiro_nome'] . ' foi adcionado')
            ->body('O paciente ' . $farmacia->paciente['primeiro_nome'] .' tem novos remedios')
            ->actions([
                Action::make('Saiba mais')
                ->button()
                ->url(route('filament.admin.resources.farmacias.view' , $farmacia->id))
            ]);
        //->sendToDatabase(User::all());
    }

    /**
     * Handle the Farmacia "updated" event.
     */
    public function updated(Farmacia $farmacia): void
    {
        Notification::make()
            ->warning()
            ->title('Olá. A ficha do paciente ' . $farmacia->paciente['primeiro_nome'] .' '. $farmacia->paciente['sobrenome'].' foi atualizada')
            ->body('A ficha do ' . $farmacia->paciente['primeiro_nome'] .' '. $farmacia->paciente['sobrenome'].' foram atualizadas')
            ->body('Para saber mais click no butão')
            ->actions([
                Action::make('Saiba mais')
                ->button()
                ->url(route('filament.admin.resources.farmacias.view' , $farmacia->id))
            ])
                ->sendToDatabase(User::all());
    }

    /**
     * Handle the Farmacia "deleted" event.
     */
    public function deleted(Farmacia $farmacia): void
    {
        //
    }

    /**
     * Handle the Farmacia "restored" event.
     */
    public function restored(Farmacia $farmacia): void
    {
        //
    }

    /**
     * Handle the Farmacia "force deleted" event.
     */
    public function forceDeleted(Farmacia $farmacia): void
    {
        //
    }
}
