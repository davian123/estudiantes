<?php

namespace estudiantes;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'idcurso';
    public $timestamps = false;


    protected $fillable = [

    	'idmaterias',
    	'nombre',
    	'salon_curso',
    	

    ];

    protected $guarded = [
    ];
}
