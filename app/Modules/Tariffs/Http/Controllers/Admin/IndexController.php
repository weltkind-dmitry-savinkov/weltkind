<?php

namespace App\Modules\Tariffs\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Image;
use App\Modules\Admin\Http\Controllers\Priority;

use App\Modules\Tariffs\Models\Tariff;

use Illuminate\Support\Facades\Auth;


class IndexController extends Admin
{

    use Image, Priority;

    public function getModel(){
        return new Tariff();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];
    }




}
