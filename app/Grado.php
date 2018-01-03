<?php

namespace NicStore;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table='grado';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    	'nombre',
    	'condicion',
    
    	
    ];

    protected $guarded =[
    ];
}
