<?php

namespace App\Modules\Blog\Providers;

use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{

    public $module = 'blog';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->make('view')->composer('blog::main', 'App\Modules\Blog\Http\ViewComposers\MainComposer');
    }


}
