<?php

namespace App\Modules\Reviews\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Reviews\Models\Review;

class IndexController extends Controller{

   public function getModel(){
       return new Review();
   }
}