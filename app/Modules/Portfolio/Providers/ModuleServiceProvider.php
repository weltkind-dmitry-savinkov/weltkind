<?php

namespace App\Modules\Portfolio\Providers;

use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{

    public $module = 'portfolio';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->make('view')->composer('portfolio::main', 'App\Modules\Portfolio\Http\ViewComposers\MainComposer');
    }


}
