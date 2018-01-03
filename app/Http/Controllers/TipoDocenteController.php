<?php

namespace NicStore\Http\Controllers;

use Illuminate\Http\Request;
use NicStore\Http\Requests;
use NicStore\TipoDocente;
use Illuminate\Support\Facades\Redirect;
use NicStore\Http\Requests\TipoDocenteFormRequest;
use DB;

class TipoDocenteController extends Controller
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
    		$tipodocentes=DB::table('tipodocente')->where('nombre','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('id','asc')
    		->paginate(5);

    		return view('docente.tipodocente.index',["tipodocentes"=>$tipodocentes,"searchText"=>$query]);
    	}
    	
    }
     public function create()
    {
    	return view ("docente.tipodocente.create");
    }
     public function store(TipoDocenteFormRequest $request)
    {
    	$tipodocente=new TipoDocente;
    	$tipodocente->nombre=$request->get('nombre');
    	$tipodocente->condicion=('1');
    	$tipodocente->save();

    	return Redirect::to('docente/tipodocente');

    }
     public function show($id)
    {
    	return view("docente.tipodocente.show",["tipodocente"=>TipoDocente::findOrFail($id)]);
    }
     public function edit($id)
    {
    	return view("docente.tipodocente.edit",["tipodocente"=>TipoDocente::findOrFail($id)]);
    }
     public function update(TipoDocenteFormRequest $request,$id)
    {
    	$tipodocente= TipoDocente::findOrFail($id);
    	$tipodocente->nombre=$request->get('nombre');
       	$tipodocente->update();

       	return Redirect::to('docente/tipodocente');
    }
     public function destroy($id)
    {
    	$tipodocente=TipoDocente::findOrFail($id);
    	$tipodocente->condicion='0';
    	$tipodocente->update();
    	
    	return Redirect::to('docente/tipodocente');
    		
    }
}
