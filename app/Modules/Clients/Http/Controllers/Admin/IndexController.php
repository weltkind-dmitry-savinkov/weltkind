<?php

namespace App\Modules\Clients\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Image;
use App\Modules\Admin\Http\Controllers\Priority;
use App\Modules\Clients\Models\Client;


class IndexController extends Admin
{

    use Image, Priority;

    public function getModel(){
        return new Client();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];

    }





}
