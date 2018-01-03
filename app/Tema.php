<?php

namespace NicStore;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $table='tema';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    	'nombre',
    	'condicion',
    
    	
    ];

    protected $guarded =[
    ];
}
