<?php

namespace NicStore\Http\Controllers;

use Illuminate\Http\Request;
use NicStore\Http\Requests;
use NicStore\Unidad;
use Illuminate\Support\Facades\Redirect;
use NicStore\Http\Requests\UnidadFormRequest;
use DB;

class UnidadController extends Controller
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
    		$unidades=DB::table('unidad')->where('nombre','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('id','asc')
    		->paginate(5);

    		return view('unidad.unidad.index',["unidades"=>$unidades,"searchText"=>$query]);
    	}
    	
    }
     public function create()
    {
    	return view ("unidad.unidad.create");
    }
     public function store(UnidadFormRequest $request)
    {
    	$unidad=new Unidad;
    	$unidad->nombre=$request->get('nombre');
    	$unidad->condicion=('1');
    	$unidad->save();

    	return Redirect::to('unidad/unidad');

    }
     public function show($id)
    {
    	return view("unidad.unidad.show",["unidad"=>Unidad::findOrFail($id)]);
    }
     public function edit($id)
    {
    	return view("unidad.unidad.edit",["unidad"=>Unidad::findOrFail($id)]);
    }
     public function update(UnidadFormRequest $request,$id)
    {
    	$unidad= Unidad::findOrFail($id);
    	$unidad->nombre=$request->get('nombre');
       	$unidad->update();

       	return Redirect::to('unidad/unidad');
    }
     public function destroy($id)
    {
    	$unidad=Unidad::findOrFail($id);
    	$unidad->condicion='0';
    	$unidad->update();
    	
    	return Redirect::to('unidad/unidad');
    		
    }}
