<?php

namespace NicStore\Http\Controllers;

use Illuminate\Http\Request;
use NicStore\Http\Requests;
use NicStore\Apps;
use NicStore\AppsDocente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use NicStore\Http\Requests\AppsFormRequest;
use DB;

class AppsDocenteController extends Controller
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
    		$aplicaciones=DB::table('appsdocente as appdoc')
            ->join('docente as doc','appdoc.iddocente','=','doc.id')
            ->join('apps as app','app.id','=','appdoc.idapps')
            ->join('grado as gra','app.idgrado','=','gra.id')
            ->join('asignatura as asig','app.idasignatura','=','asig.id')
            ->join('unidad as u','app.idunidad','=','u.id')
            ->join('tema as t','app.idtema','=','t.id')
            ->select('appdoc.id','app.nombre','app.descripcion','app.imagen','gra.nombre as grado','asig.nombre as asignatura','u.nombre as Unidades','t.nombre as Temas','doc.primernombre as docente')
            ->where('appdoc.condicion','=','1')
            ->where('app.nombre','LIKE','%'.$query.'%')
            ->orwhere('gra.nombre','LIKE','%'.$query.'%')
            ->orwhere('asig.nombre','LIKE','%'.$query.'%')
            ->orwhere('t.nombre','LIKE','%'.$query.'%')
    		->orderBy('app.id','asc')
    		->paginate(5);

    		return view('aplicaciones.aplicaciones.index',["aplicaciones"=>$aplicaciones,"searchText"=>$query]);
    	}
    	
    }
     public function create()
    {    $docentes=DB::table('docente')->where('condicion','=','1')->get();
         $grados=DB::table('grado')->where('condicion','=','1')->get();
         $asignaturas=DB::table('asignatura')->where('condicion','=','1')->get();
         $unidades=DB::table('unidad')->where('condicion','=','1')->get();
         $temas=DB::table('tema')->where('condicion','=','1')->get();
    	return view ("aplicaciones.aplicaciones.create",["grados"=>$grados,"asignaturas"=>$asignaturas,"unidades"=>$unidades,"temas"=>$temas,"docentes"=>$docentes]);

    }
     public function store(AppsFormRequest $request)
    {
    	

        try {
        DB::beginTransaction(); 
    	$aplicacion=new Apps;
    	$aplicacion->nombre=$request->get('nombre');
    	$aplicacion->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/aplicaciones/',$file->getClientOriginalName());
            $aplicacion->imagen=$file->getClientOriginalName();
        }
        $aplicacion->idgrado=$request->get('idgrado');
        $aplicacion->idasignatura=$request->get('idasignatura');
        $aplicacion->idunidad=$request->get('idunidad');
        $aplicacion->idtema=$request->get('idtema');
    	$aplicacion->condicion=('1');
    	$aplicacion->save();

    	$appsdocente=new AppsDocente;
    	$appsdocente->idapps=$aplicacion->id;
        $appsdocente->iddocente=$request->get('iddocente');
        $appsdocente->condicion=('1');
        $appsdocente->save();


    	DB::commit();
           
       } catch (Exception $e) {
           DB::rollback();
       }
    	return Redirect::to('aplicaciones/aplicaciones');



    }
     public function show($id)
    {
    	return view("aplicaciones.aplicaciones.show",["aplicacion"=>Apps::findOrFail($id)]);
    }
     public function edit($id)
    {  
        $aplicaciones=AppsDocente::findOrFail($id);
        $docentes=DB::table('docente')->where('condicion','=','1')->get();
        $Grados=DB::table('grado')->where('condicion','=','1')->get();
        $asignaturas=DB::table('asignatura')->where('condicion','=','1')->get();
        $unidades=DB::table('unidad')->where('condicion','=','1')->get();
        $temas=DB::table('tema')->where('condicion','=','1')->get();

    	return view("aplicaciones.aplicaciones.edit",["aplicaciones"=>$aplicaciones,"Grados"=>$Grados,"asignaturas"=>$asignaturas,"unidades"=>$unidades,"temas"=>$temas,"docentes"=>$docentes]);
    }
     public function update(AppsFormRequest $request,$id)
    {
    	$aplicacion= Apps::findOrFail($id);
    	$aplicacion->nombre=$request->get('nombre');
    	$aplicacion->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/aplicaciones/',$file->getClientOriginalName());
            $aplicacion->imagen=$file->getClientOriginalName();
        }
        $aplicacion->idgrado=$request->get('idgrado');
        $aplicacion->idasignatura=$request->get('idasignatura');
        $aplicacion->idunidad=$request->get('idunidad');
        $aplicacion->idtema=$request->get('idtema');
        $aplicacion->iddocente=$request->get('iddocente');
        $aplicacion->condicion=('1');
       	$aplicacion->update();

       	return Redirect::to('aplicaciones/aplicaciones');
    }
     public function destroy($id)
    {
    	$aplicacion=AppsDocente::findOrFail($id);
    	$aplicacion->condicion='0';
    	$aplicacion->update();
    	
    	return Redirect::to('aplicaciones/aplicaciones');
    		
    }
}
