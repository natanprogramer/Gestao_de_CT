<?php

namespace App\Policies;

use App\Models\Farmacia;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FarmaciaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('farmacia_leitura');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Farmacia $farmacia): bool
    {
        return $user->hasPermissionTo('farmacia_leitura');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('farmacia_criacao');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Farmacia $farmacia): bool
    {
        return $user->hasPermissionTo('farmacia_atualizacao');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Farmacia $farmacia): bool
    {
        return $user->hasPermissionTo('farmacia_exclusao');
    }

}
