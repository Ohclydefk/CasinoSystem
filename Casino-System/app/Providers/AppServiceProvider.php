<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\MemberRepository::class,
            fn($app) => new \App\Repositories\MemberRepository(new \App\Models\Member)
        );

        $this->app->bind(
            \App\Services\MemberService::class,
            fn($app) => new \App\Services\MemberService($app->make(\App\Repositories\MemberRepository::class))
        );
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
