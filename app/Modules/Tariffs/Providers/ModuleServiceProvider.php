<?php

namespace App\Modules\Tariffs\Providers;

use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{

    public $module = 'tariffs';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->make('view')->composer('tariffs::main', 'App\Modules\Tariffs\Http\ViewComposers\MainComposer');
    }


}
