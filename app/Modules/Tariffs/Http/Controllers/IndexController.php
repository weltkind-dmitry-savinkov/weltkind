<?php

namespace App\Modules\Tariffs\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Tariffs\Models\Tariff;

class IndexController extends Controller
{
    public function getModel()
    {
        return new Tariff();
    }

}
