<?php
namespace App\Modules\Tariffs\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Tariffs\Models\Tariff;

class MainComposer
{
    public function compose(View $view){
        $tariff = new Tariff();
        $view->with('entity', Tariff::published()->get());
    }
}