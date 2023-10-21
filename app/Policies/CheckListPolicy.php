<?php

namespace App\Policies;

use App\Models\CheckList;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CheckListPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('checklist_leitura');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CheckList $checkList): bool
    {
        return $user->hasPermissionTo('checklist_leitura');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('checklist_criacao');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CheckList $checkList): bool
    {
        return $user->hasPermissionTo('checklist_atualizacao');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CheckList $checkList): bool
    {
        return $user->hasPermissionTo('checklist_exclusao');
    }

}
