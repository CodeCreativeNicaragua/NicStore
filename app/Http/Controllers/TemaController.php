<?php

namespace NicStore\Http\Controllers;

use Illuminate\Http\Request;
use NicStore\Http\Requests;
use NicStore\Tema;
use Illuminate\Support\Facades\Redirect;
use NicStore\Http\Requests\TemaFormRequest;
use DB;

class TemaController extends Controller
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
    		$temas=DB::table('tema')->where('nombre','LIKE','%'.$query.'%')
    		->where('condicion','=','1')
    		->orderBy('id','asc')
    		->paginate(5);

    		return view('tema.tema.index',["temas"=>$temas,"searchText"=>$query]);
    	}
    	
    }
     public function create()
    {
    	return view ("tema.tema.create");
    }
     public function store(TemaFormRequest $request)
    {
    	$tema=new Tema;
    	$tema->nombre=$request->get('nombre');
    	$tema->condicion=('1');
    	$tema->save();

    	return Redirect::to('tema/tema');

    }
     public function show($id)
    {
    	return view("tema.tema.show",["tema"=>Tema::findOrFail($id)]);
    }
     public function edit($id)
    {
    	return view("tema.tema.edit",["tema"=>Tema::findOrFail($id)]);
    }
     public function update(TemaFormRequest $request,$id)
    {
    	$tema= Tema::findOrFail($id);
    	$tema->nombre=$request->get('nombre');
       	$tema->update();

       	return Redirect::to('tema/tema');
    }
     public function destroy($id)
    {
    	$tema=Tema::findOrFail($id);
    	$tema->condicion='0';
    	$tema->update();
    	
    	return Redirect::to('tema/tema');
    		
    }
}
