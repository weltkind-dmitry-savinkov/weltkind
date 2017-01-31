<?php
namespace App\Modules\Admin\Http\ViewComposers;

use Illuminate\View\View;
use Caffeinated\Modules\Facades\Module;

class LanguagesComposer
{


    public function compose(View $view)
    {

        if (action()!='index'){
            return;
        }

        $config = module_config('settings');

        if (empty($config)){
            return;
        }


        if (isset($config['localization']) && $config['localization'] == true){
            $locales = localization()->getSupportedLocales();
            $view->with('supportedLocales', $locales);
        }


    }
}