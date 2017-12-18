<?php

namespace App\Providers;

use App\Inspecao;
use App\Policies\InspecaoPolicy;
use App\Ponte;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use App\Policies\PontePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Ponte::class => PontePolicy::class,
        Inspecao::class => InspecaoPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

        Gate::define('validate-pontes', function ($user) {
            return $user->role->nome_role === 'Director' || $user->role->nome_role === 'Administrador';
        });

        //
    }
}
