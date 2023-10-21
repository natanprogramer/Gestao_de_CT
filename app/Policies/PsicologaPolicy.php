<?php

namespace App\Policies;

use App\Models\Psicologa;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PsicologaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('psicologia_leitura');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Psicologa $psicologa): bool
    {
        return $user->hasPermissionTo('psicologia_leitura');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('psicologia_criacao');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Psicologa $psicologa): bool
    {
        return $user->hasPermissionTo('psicologia_atualizacao');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Psicologa $psicologa): bool
    {
        return $user->hasPermissionTo('psicologia_exclusao');
    }

}
