<?php

namespace App\Modules\Faq\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Priority;
use App\Modules\Faq\Models\Faq;


class IndexController extends Admin
{

    use Priority;

    public function getModel(){
        return new Faq();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];

    }





}
