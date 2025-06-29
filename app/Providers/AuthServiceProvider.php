<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
public function boot(): void
    {
        $this->registerPolicies();

        // Definir gates para verificación de roles
        Gate::define('admin-access', fn(User $user) => $user->hasRole('admin'));
        Gate::define('owner-access', fn(User $user) => $user->hasRole('owner'));
        Gate::define('player-access', fn(User $user) => $user->hasRole('player'));
    }
}
