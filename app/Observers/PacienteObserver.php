<?php

namespace App\Observers;

use App\Models\Paciente;
use App\Models\User;
use Filament\Notifications\Actions\Action as ActionsAction;
use Filament\Notifications\Notification;
use Illuminate\Notifications\Action;

class PacienteObserver
{
    /**
     * Handle the Paciente "created" event.
     */
    public function created(Paciente $paciente): void
    {
        Notification::make()
        ->title('Novo paciente cadastrado')
        ->body('Seja bem vindo ' .$paciente->primeiro_nome . ' ao Instituto D.V.V')
        ->actions([
            ActionsAction::make('Visualizar')
                ->button()
                ->url( route('filament.admin.resources.pacientes.view' , $paciente->id))

        ])
            ->sendToDatabase(User::all());
    }

    /**
     * Handle the Paciente "updated" event.
     */
    public function updated(Paciente $paciente): void
    {
        Notification::make()
        ->warning()
        ->title('Cadastro atualizado')
        ->body('O cadastro do paciente ' .$paciente->primeiro_nome . ' , foi atualizado')
        ->actions([
            ActionsAction::make('Visualizar')
                ->button()
                ->url( route('filament.admin.resources.pacientes.view', $paciente->id))

        ])
            ->sendToDatabase(User::all());
    }

    /**
     * Handle the Paciente "deleted" event.
     */
    public function deleted(Paciente $paciente): void
    {
        Notification::make()
        ->warning()
        ->title('Cadastro excluido')
        ->body('O cadastro do paciente ' .$paciente->primeiro_nome . ' , foi excluido')

            ->sendToDatabase(User::all());
    }

}
