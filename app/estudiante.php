<?php

namespace estudiantes;

use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    protected $table = 'estudiante';
    protected $primaryKey = 'idestudiante';
    public $timestamps = false;

    protected $fillable =[

    	'idcurso',
    	'nombre',
    	'edad',
	
    ];

    protected $guarded = [

    ];
}
