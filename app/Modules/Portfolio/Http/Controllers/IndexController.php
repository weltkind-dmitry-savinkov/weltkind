<?php

namespace App\Modules\Portfolio\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Portfolio\Models\Category;
use App\Modules\Portfolio\Models\Portfolio;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;

class IndexController extends Controller{


    public function getModel(){
        return new Portfolio();
    }

    public function index(){

        $categories = Category::published()->get();

        $request = Request::getFacadeRoot();

        if ($request->category){
            $sql = Category::find($request->category)->works()->published();
        }
        else{
            $sql = Portfolio::published();
        }

        $entities = $sql->paginate(12);

        return view('portfolio::index', ['entities'=>$entities, 'categories'=>$categories]);
    }

    public function show($id){

        View::share('next', Portfolio::where('id', '<', $id)->max('id'));

        return parent::show($id);


    }


}