<?php

namespace App\Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use App\Facades\Route;
use Illuminate\Support\Facades\View;


abstract class Admin extends Controller
{

    protected $viewPrefix = '';
    protected $routePrefix = '';


    public $perPage = 10;


    public function __construct(){
        parent::__construct();
        $this->setRoutePrefix();
        $this->setViewPrefix();
        $this->share();



    }

    protected function share(){
        View::share('title', module_config('settings.title'));
        View::share('routePrefix', $this->routePrefix);

    }

    protected function setRoutePrefix(){
        if (module() && !$this->routePrefix){
            $this->routePrefix = config('cms.uri').'.'.module().'.';
        }
    }

    protected function setViewPrefix(){

        if (module() && !$this->viewPrefix){
            $this->viewPrefix = module().'::';
        }
    }

    abstract public function getModel();

    public function getFormViewName(){
        return $this->viewPrefix.'admin.form';
    }

    public function getIndexViewName(){
        return $this->viewPrefix.'admin.index';
    }


    public function getRules($request, $id=false){
        return [];
    }

    public function index(){

        $entity = $this->getModel();

        $entities = $entity->sortable()->admin()->paginate($this->perPage);

        $this->after($entities);

        return view($this->getIndexViewName(), ['entities'=>$entities]);

    }

    public function create(){

        $entity = $this->getModel();

        $this->after($entity);

        return view($this->getFormViewName(), ['entity'=>$entity]);
    }

    public function store(Request $request){

        $this->validate($request, $this->getRules($request));

        $entity = $this->getModel()->create($request->all());

        $this->after($entity);

        return redirect()->route($this->routePrefix.'edit', ['id'=>$entity->id])->with('message', 'Запись успешно добавлена');
    }

    public function edit($id)
    {

        $entity = $this->getModel()->findOrFail($id);

        $this->after($entity);

        return view($this->getFormViewName(), ['entity'=>$entity, 'routePrefix'=>$this->routePrefix]);

    }

    public function update(Request $request, $id){

        $this->validate($request, $this->getRules($request, $id));

        $entity = $this->getModel()->findOrFail($id);

        $entity->update($request->all());

        $this->after($entity);

        return redirect()->back()->with('message', 'Данные успешно обновлены');

    }

    public function destroy($id){

        $entity = $this->getModel()->find($id);

        $entity->delete();

        $this->after($entity);

        return redirect()->back()->with('message', 'Запись удалена');

    }


    protected function after($entity){
        //
    }




   
}
