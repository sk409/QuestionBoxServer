<?php

namespace App\Providers;

use App\Presenter\UserOutputPort;
use App\Presenter\UserPresenter;
use Illuminate\Support\ServiceProvider;

class OutputPortServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserOutputPort::class, UserPresenter::class);
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
