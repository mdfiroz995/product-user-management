<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('manage-users', function ($user) {
            return $user->isAdmin() || $user->hasPermission('manage-users');
        });

        Gate::define('view-profile', function ($user, $profileUser) {
            return $user->id === $profileUser->id;
        });

        Gate::define('update-profile', function ($user, $profileUser) {
            return $user->id === $profileUser->id;
        });
    }
}
