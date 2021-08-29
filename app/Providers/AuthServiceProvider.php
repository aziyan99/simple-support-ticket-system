<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Ticket;
use App\Policies\CategoryPolicy;
use App\Policies\TicketPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });

        /* define a manager user role */
        Gate::define('isAgent', function ($user) {
            return $user->role == 'agent';
        });

        /* define a user role */
        Gate::define('isCustomer', function ($user) {
            return $user->role == 'customer';
        });
    }
}
