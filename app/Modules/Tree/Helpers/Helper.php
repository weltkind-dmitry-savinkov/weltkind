<?php
namespace App\Modules\Tree\Helpers;

use Caffeinated\Modules\Facades\Module;

class Helper{

    public static function getModulesSelect($all = false){
        $modules = Module::all();
        dd($modules);
    }


}