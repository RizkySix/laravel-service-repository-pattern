<?php

namespace App\Providers;

use App\Repositories\AnimeFanArt\AnimeFanArtRepositoryImplement;
use App\Repositories\AnimeFanArt\AnimeFanArtRepositoryInterface;
use App\Repositories\User\NewImplement;
use App\Repositories\User\UserRepositoryImplement;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\AnimeFanArt\AnimeFanArtServiceImplement;
use App\Services\AnimeFanArt\AnimeFanArtServiceInterface;
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
        $this->app->bind(UserRepositoryInterface::class , UserRepositoryImplement::class);

        //Anime fan art section
        $this->app->bind(AnimeFanArtRepositoryInterface::class , AnimeFanArtRepositoryImplement::class);
        $this->app->bind(AnimeFanArtServiceInterface::class , AnimeFanArtServiceImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
