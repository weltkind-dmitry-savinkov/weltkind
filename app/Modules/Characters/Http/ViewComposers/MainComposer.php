<?php
namespace App\Modules\Characters\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Characters\Models\Character;

class MainComposer
{
    public function compose(View $view){
        $view->with('entities', Character::published()->get());
    }
}