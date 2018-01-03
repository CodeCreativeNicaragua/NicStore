<?php

namespace NicStore;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
     protected $table='unidad';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    	'nombre',
    	'condicion',
    
    	
    ];

    protected $guarded =[
    ];
}
