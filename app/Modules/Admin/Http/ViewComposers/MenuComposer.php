<?php
namespace App\Modules\Admin\Http\ViewComposers;

use Illuminate\View\View;
use Caffeinated\Modules\Facades\Module;

class MenuComposer
{


    public function compose(View $view = null)
    {

        $modules = Module::all();

        $groups = [];
        $items = [];


        if (empty($modules)) {
            return;
        }

        foreach ($modules as $module => $info) {

            $config = module_config('menu', strtolower($module));
            if (isset($config['groups'])) {

                $groups = array_merge($groups, $config['groups']);
            }

            if (isset($config['items'])) {
                $items = array_merge($items, $config['items']);
            }

        }

        if (empty($groups)){
            return;
        }

        if (empty($items)) {
            return;
        }

        $groups = collect($groups)->sortBy('title')->sortByDesc('priority');

        $items = collect($items)->sortBy('title')->sortByDesc('priority');


        $groups = $groups->toArray();
        foreach ($groups as &$group) {
            foreach ($items as $item) {
                if ($item['group'] == $group['slug']){
                    $group['items'][] = $item;
                }
            }
        }


        $view->with('items', $groups);

    }
}