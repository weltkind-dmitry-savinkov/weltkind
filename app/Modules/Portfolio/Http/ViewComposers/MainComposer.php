<?php
namespace App\Modules\Portfolio\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Portfolio\Models\Portfolio;

class MainComposer
{


    public function compose(View $view){
        $view->with('items', Portfolio::published()->where('on_main', 1)->get());
    }
}