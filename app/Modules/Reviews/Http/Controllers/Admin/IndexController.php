<?php

namespace App\Modules\Reviews\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Image;
use App\Modules\Admin\Http\Controllers\Priority;
use App\Modules\Reviews\Models\Review;


class IndexController extends Admin
{

    use Image, Priority;

    public function getModel(){
        return new Review();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];

    }





}
