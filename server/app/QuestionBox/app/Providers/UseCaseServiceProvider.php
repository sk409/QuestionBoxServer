<?php

namespace App\Providers;

use App\UseCase\AccessTokenIssueInteractor;
use App\UseCase\AccessTokenIssueUseCase;
use App\UseCase\RefreshTokenIssueInteractor;
use App\UseCase\RefreshTokenIssueUseCase;
use App\UseCase\UserExistenceConfirmationInteractor;
use App\UseCase\UserExistenceConfirmationUseCase;
use App\UseCase\UserRegistrationInteractor;
use App\UseCase\UserRegistrationUseCase;
use Illuminate\Support\ServiceProvider;

class UseCaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AccessTokenIssueUseCase::class, AccessTokenIssueInteractor::class);
        $this->app->bind(RefreshTokenIssueUseCase::class, RefreshTokenIssueInteractor::class);
        $this->app->bind(UserExistenceConfirmationUseCase::class, UserExistenceConfirmationInteractor::class);
        $this->app->bind(UserRegistrationUseCase::class, UserRegistrationInteractor::class);
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
