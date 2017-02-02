<?php

namespace App\Modules\Characters\Http\Controllers;

use Illuminate\Http\Request;

use App\\Http\Requests;
use App\\Http\Controllers\Controller;
use App\Modules\Characters\Models\Character;

class CharactersController extends Controller
{
    public function getModel()
    {
        return new Character();
    }

}
