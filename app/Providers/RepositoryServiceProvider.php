<?php

namespace App\Providers;

use App\Repositories\Eloquent\Base;
use App\Repositories\Eloquent\Todo;
use App\Repositories\Interfaces\IEloquent;
use App\Repositories\Interfaces\ITodo;
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
        $this->app->bind(IEloquent::class, Base::class);
        $this->app->bind(ITodo::class, Todo::class);
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
