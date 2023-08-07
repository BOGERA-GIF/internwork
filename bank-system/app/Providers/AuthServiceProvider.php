<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
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
    //     $this->registerPolicies();

    // Auth::provider('customers', function ($app, array $config) {
    //     return new EloquentUserProvider($app['hash'], $config['model']);
    // });

    // Auth::extend('customers', function ($app, $name, array $config) {
    //     return new Guard(
    //         new EloquentUserProvider($app['hash'], $config['model']),
    //         $app['session.store']
    //     );
    // });
    }
}
