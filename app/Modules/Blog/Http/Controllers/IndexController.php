<?php

namespace App\Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Blog\Models\Blog;

class IndexController extends Controller
{


    public function getModel()
    {
        return new Blog();
    }


}