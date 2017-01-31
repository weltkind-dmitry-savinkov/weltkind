<?php

namespace App\Modules\Faq\Providers;

use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{

    public $module = 'faq';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }


}
