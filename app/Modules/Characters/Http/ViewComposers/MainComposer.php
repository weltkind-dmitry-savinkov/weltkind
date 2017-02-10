<?php
namespace App\Modules\Characters\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Characters\Models\Character;

class MainComposer
{
    public function compose(View $view){
        $character = new Character();
        $view->with('entity', $character->inRandomOrder()->first());
    }
}