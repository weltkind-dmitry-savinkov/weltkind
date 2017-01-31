<?php

namespace App\Modules\Tree\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Tree\Models\Tree;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class IndexController extends Admin
{

    public $perPage = 100;

    public function getModel()
    {
        return new Tree();
    }

    public function getRules($request, $id = false)
    {
        $rules = [];


        $rules['slug'] = [
            'sometimes', 'required', 'regex:/(^[A-Za-z0-9_\-]+$)+/', 'max:60',
            Rule::unique('tree')->ignore($id)->where('lang', lang())
        ];

        $rules['title'] = 'sometimes|required|max:255';

        return $rules;
    }


    protected function after($entity)
    {
        if (action() == 'store' || action() == 'update') {

            if (Request::get('parent_id')) {
                $parent = $this->getModel()->findOrFail(Request::get('parent_id'));
                try {
                    $entity->makeChildOf($parent);
                } catch (\Baum\MoveNotPossibleException $e) {
                    redirect()->back()->withErrors(['Вы не можете перенести страницу на эту позицию']);
                }
            }


        }
    }

    public function priority($id, $direction)
    {

        $entity = $this->getModel()->findOrFail($id);

        try {
            if ($direction == 'up') {
                $entity->moveLeft();
            } else {
                $entity->moveRight();
            }

        } catch (\Baum\MoveNotPossibleException $e) {
            redirect()->back();
        }


        $this->after($entity);

        return redirect()->back();
    }


}
