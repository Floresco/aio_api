<?php

namespace App\Providers;

use Bouncer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Schema::defaultStringLength(191);
//        Bouncer::useAbilityModel(\App\Models\Ability::class);
//        Bouncer::useRoleModel(\App\Models\Role::class);
    }
}
