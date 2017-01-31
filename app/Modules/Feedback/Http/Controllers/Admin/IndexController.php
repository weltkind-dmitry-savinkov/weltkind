<?php

namespace App\Modules\Feedback\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Feedback\Models\Feedback;
use Illuminate\Http\Request;


class IndexController extends Admin
{

    public function getModel(){
        return new Feedback();
    }

    public function create(){
        abort(404);
    }

    public function store(Request $request){
        abort(404);
    }


    public function update(Request $request, $id){
        abort(404);
    }





}
