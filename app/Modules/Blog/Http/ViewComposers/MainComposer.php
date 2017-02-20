<?php
namespace App\Modules\Blog\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Blog\Models\Blog;

class MainComposer
{
    public function compose(View $view){
        $view->with('entities', Blog::published()->limit(2)->get());
    }
}