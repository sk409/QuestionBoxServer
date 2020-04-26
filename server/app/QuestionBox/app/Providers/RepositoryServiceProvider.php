<?php

namespace App\Providers;

use App\DB\EloquentAccessTokenRepository;
use App\DB\EloquentRefreshTokenRepository;
use App\DB\EloquentUserRepository;
use App\Gateway\Repository\AccessTokenRepository;
use App\Gateway\Repository\RefreshTokenRepository;
use App\Gateway\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AccessTokenRepository::class, EloquentAccessTokenRepository::class);
        $this->app->bind(RefreshTokenRepository::class, EloquentRefreshTokenRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
