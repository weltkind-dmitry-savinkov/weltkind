<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        return view('layouts.app');
    }

    public function about(){
        dd ('ABOUT!!');
    }
}
