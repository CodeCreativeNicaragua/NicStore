<?php

namespace NicStore\Http\Controllers;

use Illuminate\Http\Request;
use NicStore\Http\Requests;
use NicStore\Asignatura;
use Illuminate\Support\Facades\Redirect;
use NicStore\Http\Requests\AsignaturaFormRequest;
use DB;

class AsignaturaController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request) 
    	{
    		$query=trim($request->get('searchText'));
    		$asignaturas=DB::table('asignatura')
            ->where('nombre','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('id','asc')
    		->paginate(5);

    		return view('asignatura.asignatura.index',["asignaturas"=>$asignaturas,"searchText"=>$query]);
    	}
    	
    }
     public function create()
    {
    	return view ("asignatura.asignatura.create");
    }
     public function store(AsignaturaFormRequest $request)
    {
    	$asignatura=new Asignatura;
    	$asignatura->nombre=$request->get('nombre');
    	$asignatura->condicion=('1');
    	$asignatura->save();

    	return Redirect::to('asignatura/asignatura');

    }
     public function show($id)
    {
    	return view("asignatura.asignatura.show",["asignatura"=>Asignatura::findOrFail($id)]);
    }
     public function edit($id)
    {
    	return view("asignatura.asignatura.edit",["asignatura"=>Asignatura::findOrFail($id)]);
    }
     public function update(AsignaturaFormRequest $request,$id)
    {
    	$asignatura= Asignatura::findOrFail($id);
    	$asignatura->nombre=$request->get('nombre');
       	$asignatura->update();

       	return Redirect::to('asignatura/asignatura');
    }
     public function destroy($id)
    {
    	$asignatura=Asignatura::findOrFail($id);
    	$asignatura->condicion='0';
    	$asignatura->update();
    	
    	return Redirect::to('asignatura/asignatura');
    		
    }
}
