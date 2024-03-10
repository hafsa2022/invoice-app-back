<?php

namespace App\Providers;

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
        // Repositories
        $this->app->bind('App\Repositories\Interfaces\IUserRepository', 'App\Repositories\UserRepository');
        $this->app->bind('App\Repositories\Interfaces\IInvoiceRepository', 'App\Repositories\InvoiceRepository');
        $this->app->bind('App\Repositories\Interfaces\ISettingRepository', 'App\Repositories\SettingRepository');
        $this->app->bind('App\Repositories\Interfaces\IClientRepository', 'App\Repositories\ClientRepository');
        $this->app->bind('App\Repositories\Interfaces\ICarRepository', 'App\Repositories\CarRepository');
        $this->app->bind('App\Repositories\Interfaces\IInvoiceItemRepository', 'App\Repositories\InvoiceItemRepository');

        // Services
        $this->app->bind('App\Services\Interfaces\IUserService', 'App\Services\UserService');
        $this->app->bind('App\Services\Interfaces\IInvoiceService', 'App\Services\InvoiceService');
        $this->app->bind('App\Services\Interfaces\ICarService', 'App\Services\CarService');
        $this->app->bind('App\Services\Interfaces\ISettingService', 'App\Services\SettingService');
        $this->app->bind('App\Services\Interfaces\IClientService', 'App\Services\ClientService');
        $this->app->bind('App\Services\Interfaces\IInvoiceItemService', 'App\Services\InvoiceItemService');


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
