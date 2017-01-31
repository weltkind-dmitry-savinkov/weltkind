<?php

namespace App\Modules\Portfolio\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Priority;
use App\Modules\Portfolio\Models\Category;


class CategoriesController extends Admin
{

    use Priority;

    protected $routePrefix = 'admin.categories.';

    public function getModel(){
        return new Category();
    }

    public function getFormViewName(){
        return $this->viewPrefix.'categories.form';
    }

    public function getIndexViewName(){
        return $this->viewPrefix.'categories.index';
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];

    }





}
