<?php

namespace NicStore\Http\Controllers;

use Illuminate\Http\Request;
use NicStore\Http\Requests;
use NicStore\Grado;
use Illuminate\Support\Facades\Redirect;
use NicStore\Http\Requests\GradoFormRequest;
use DB;

class GradoController extends Controller
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
    		$grados=DB::table('grado')->where('nombre','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('id','asc')
    		->paginate(5);

    		return view('grado.grado.index',["grados"=>$grados,"searchText"=>$query]);
    	}
    	
    }
     public function create()
    {
    	return view ("grado.grado.create");
    }
     public function store(GradoFormRequest $request)
    {
    	$grado=new Grado;
    	$grado->nombre=$request->get('nombre');
    	$grado->condicion=('1');
    	$grado->save();

    	return Redirect::to('grado/grado');

    }
     public function show($id)
    {
    	return view("grado.grado.show",["grado"=>Grado::findOrFail($id)]);
    }
     public function edit($id)
    {
    	return view("grado.grado.edit",["grado"=>Grado::findOrFail($id)]);
    }
     public function update(GradoFormRequest $request,$id)
    {
    	$grado= Grado::findOrFail($id);
    	$grado->nombre=$request->get('nombre');
       	$grado->update();

       	return Redirect::to('grado/grado');
    }
     public function destroy($id)
    {
    	$grado=Grado::findOrFail($id);
    	$grado->condicion='0';
    	$grado->update();
    	
    	return Redirect::to('grado/grado');
    		
    }
}
