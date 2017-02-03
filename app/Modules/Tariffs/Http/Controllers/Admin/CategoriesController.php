<?php

namespace App\Modules\Tariffs\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Priority;
use App\Modules\Tariffs\Models\Category;


class TariffsCategoriesController extends Admin
{

    use Priority;

    protected $routePrefix = 'admin.tariffscategories.';

    public function getModel()
    {
        return new Category();
    }

    public function getFormViewName()
    {
        return $this->viewPrefix.'tariffscategories.form';
    }

    public function getIndexViewName()
    {
        return $this->viewPrefix.'tariffscategories.index';
    }
    public function getRules($request, $id = false)
    {
        return ['title' => 'sometimes|required|max:255'];

    }





}
