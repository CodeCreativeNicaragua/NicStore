<?php

namespace NicStore;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
     protected $table='docente';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    	'primernombre',
    	'segundonombre',
    	'primerapellido',
    	'segundoapellido',
        'imagen',
    	'correo',
    	'celular',
    	'idtipodocente',
        'estado',


    
    	
    ];

    protected $guarded =[
    ];
}
