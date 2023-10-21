<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\CheckList;
use App\Models\Farmacia;
use App\Models\Paciente;
use App\Models\Permission;
use App\Models\Psicologa;
use App\Models\Role;
use App\Models\User;
use App\Policies\CheckListPolicy;
use App\Policies\FarmaciaPolicy;
use App\Policies\PacientePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\PsicologaPolicy;
use App\Policies\RolePolicy;
use App\Policies\Userpolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => Userpolicy::class,
        Role::class => RolePolicy::class,
        Permission::class   => PermissionPolicy::class,
        Paciente::class =>  PacientePolicy::class,
        Farmacia::class =>  FarmaciaPolicy::class,
        CheckList::class    =>  CheckListPolicy::class,
        Psicologa::class    =>  PsicologaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
