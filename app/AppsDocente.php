<?php

namespace NicStore;

use Illuminate\Database\Eloquent\Model;

class AppsDocente extends Model
{
    protected $table='appsdocente';

    protected $primarykey='id';

    public $timestamps=true;


    protected $fillable=[

    'id',
    'idapps',
    'iddocente',
        

    ];

    protected $guarded=[
    ];
}
