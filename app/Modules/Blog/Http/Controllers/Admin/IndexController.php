<?php

namespace App\Modules\Blog\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Blog\Models\Blog;
use Illuminate\Support\Facades\Auth;


class IndexController extends Admin
{

    public function getModel(){

        return new Blog();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];

    }





}
