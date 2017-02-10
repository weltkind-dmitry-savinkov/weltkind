<?php

namespace App\Modules\Faq\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Faq\Models\Faq;

class IndexController extends Controller
{


    public function getModel()
    {
        return new Faq();
    }


}