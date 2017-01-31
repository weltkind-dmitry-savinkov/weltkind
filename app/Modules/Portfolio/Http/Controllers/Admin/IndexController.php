<?php

namespace App\Modules\Portfolio\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Image;
use App\Modules\Admin\Http\Controllers\Priority;
use App\Modules\Portfolio\Models\Portfolio;
use App\Facades\Route;
use Illuminate\Support\Facades\Request;

class IndexController extends Admin
{

    use Image, Priority;

    public function getModel(){
        return new Portfolio();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255',
        'url'=>'sometimes|url'
        ];

    }

    protected function after($entity)
    {

        if (Route::getAction() == 'store' || Route::getAction() == 'update') {
            $this->upload($entity);
            $this->categories($entity);
        }

        if (Route::getAction() == 'edit') {
            view()->share('config', $this->getConfig());
        }

    }

    protected function categories($entity){
        $entity->categories()->detach();
        $entity->categories()->attach(Request::get('categories'));

    }





}
