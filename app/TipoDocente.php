<?php

namespace NicStore;

use Illuminate\Database\Eloquent\Model;

class TipoDocente extends Model
{
     protected $table='tipodocente';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    	'nombre',
    	'condicion',
    
    	
    ];

    protected $guarded =[
    ];
}
