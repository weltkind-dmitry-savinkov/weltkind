<?php

namespace App\Modules\Clients\Providers;

use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{

    public $module = 'clients';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->make('view')->composer('clients::main', 'App\Modules\Clients\Http\ViewComposers\MainComposer');
    }


}
