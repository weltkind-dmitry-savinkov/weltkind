<?php

namespace App\Modules\Tariffs\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Tariffs\Models\Tariff;

class TariffsController extends Controller
{
    public function getModel()
    {
        return new Tariff();
    }

    public function getTariff()
    {
        $character = new Tariff();
        $character->inRandomOrder()->first();
        return view('tariffs::main', ['entity' => $character]);
    }

}
