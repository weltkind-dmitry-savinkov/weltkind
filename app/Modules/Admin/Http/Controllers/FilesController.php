<?php

namespace App\Modules\Admin\Http\Controllers;

class FilesController extends Controller
{

    public function images(){
        return view('admin::files.images');
    }

    public function files(){
        return view('admin::files.files');
    }

}
