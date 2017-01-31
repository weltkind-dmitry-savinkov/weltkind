<?php
namespace App\Modules\Clients\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Clients\Models\Client;

class MainComposer
{


    public function compose(View $view){
        $view->with('items', Client::published()->get());
    }
}