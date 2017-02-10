<?php

namespace App\Modules\Characters\Providers;

use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{

    public $module = 'characters';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->make('view')->composer('characters::main', 'App\Modules\Characters\Http\ViewComposers\MainComposer');
    }


}
