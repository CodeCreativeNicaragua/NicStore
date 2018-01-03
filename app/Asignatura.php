<?php

namespace NicStore;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table='asignatura';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    	'nombre',
    	'condicion',
    
    	
    ];

    protected $guarded =[
    ];
}
