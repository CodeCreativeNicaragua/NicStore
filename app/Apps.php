<?php

namespace NicStore;

use Illuminate\Database\Eloquent\Model;

class Apps extends Model
{
    protected $table='apps';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    	'nombre',
    	'descripcion',
        'imagen',
        'idgrado',
        'idasignatura',
        'idunidad',
        'idtema',
    
    	
    ];

    protected $guarded =[
    ];
}
