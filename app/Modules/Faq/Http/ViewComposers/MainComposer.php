<?php
namespace App\Modules\Faq\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Faq\Models\Faq;

class MainComposer
{
    public function compose(View $view){
        $view->with('entities', Faq::published()->get());
    }
}