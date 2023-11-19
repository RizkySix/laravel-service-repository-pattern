<?php

namespace App\Providers;

use App\Repositories\User\NewImplement;
use App\Repositories\User\UserRepositoryImplement;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserServiceImplement;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class , UserServiceImplement::class);
        $this->app->bind(UserRepositoryInterface::class , NewImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
