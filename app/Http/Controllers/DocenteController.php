<?php

namespace NicStore\Http\Controllers;

use Illuminate\Http\Request;
use NicStore\Http\Requests;
use NicStore\Docente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use NicStore\Http\Requests\DocenteFormRequest;
use DB;

class DocenteController extends Controller
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
    		$docentes=DB::table('docente as d')
    		->join('tipodocente as td','d.idtipodocente','=','td.id')
    		->select('d.id','d.primernombre','d.segundonombre','d.primerapellido','d.segundoapellido','d.imagen','d.correo','d.celular','td.nombre as tipodocente','d.estado')
            ->where('d.condicion','=','1')
            ->where('d.primernombre','LIKE','%'.$query.'%')
            ->orderBy('d.id','asc')
    		->paginate(5);

    		return view('docente.docente.index',["docentes"=>$docentes,"searchText"=>$query]);
    	}
    	
    }
     public function create()
    {
    	$tipodocentes=DB::table('tipodocente')->where('condicion','=','1')->get();
        return view ("docente.docente.create",["tipodocentes"=>$tipodocentes]);
    }
     public function store(DocenteFormRequest $request)
    {
    	$docente=new Docente;
    	$docente->primernombre=$request->get('primernombre');
    	$docente->segundonombre=$request->get('segundonombre');
    	$docente->primerapellido=$request->get('primerapellido');
    	$docente->segundoapellido=$request->get('segundoapellido');
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/docentes/',$file->getClientOriginalName());
            $docente->imagen=$file->getClientOriginalName();
        }
    	$docente->correo=$request->get('correo');
    	$docente->celular=$request->get('celular');
        $docente->idtipodocente=$request->get('idtipodocente');
    	$docente->estado=('Activo');
        $docente->condicion=(1);
    	
    	$docente->save();

    	return Redirect::to('docente/docente');

    }
     public function show($id)
    {
    	return view("docente.docente.show",["docente"=>Docente::findOrFail($id)]);
    }
     public function edit($id)
    {
    	$docentes=Docente::findOrFail($id);
    	$tipodocentes=DB::table('tipodocente')->where('condicion','=','1')->get();
    	return view("docente.docente.edit",["docentes"=>$docentes,"tipodocentes"=>$tipodocentes]);
    }
     public function update(DocenteFormRequest $request,$id)
    {
    	$docente=Docente::findOrFail($id);
    	$docente->primernombre=$request->get('primernombre');
    	$docente->segundonombre=$request->get('segundonombre');
    	$docente->primerapellido=$request->get('primerapellido');
    	$docente->segundoapellido=$request->get('segundoapellido');
        $docente->idtipodocente=$request->get('idtipodocente');
    	$docente->correo=$request->get('correo');
    	$docente->celular=$request->get('celular');
    	$docente->estado=('Activo');
        $docente->condicion=('1');
    	if (Input::hasFile('imagen')) {
    		$file=Input::file('imagen');
    		$file->move(public_path().'/imagenes/docentes/',$file->getClientOriginalName());
    		$docente->imagen=$file->getClientOriginalName();
    	}
       	$docente->update();

       	return Redirect::to('docente/docente');
    }
     public function destroy($id)
    {
    	$docente=Docente::findOrFail($id);
    	$docente->estado='Inactivo';
        $docente->condicion='0';
    	$docente->update();
    	
    	return Redirect::to('docente/docente');
    	
    }
}
