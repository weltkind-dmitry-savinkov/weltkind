<?php

namespace App\Modules\Widgets\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Widgets\Models\Widget;


class IndexController extends Admin
{

    public function getModel(){
        return new Widget();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];

    }





}
