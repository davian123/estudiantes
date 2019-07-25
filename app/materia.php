<?php

namespace estudiantes;

use Illuminate\Database\Eloquent\Model;

class materia extends Model
{
    protected $table = 'materias';
    protected $primaryKey = 'idmaterias';
    public $timestamps = false;


    protected $fillable = [

    	'nombre'

    ];

    protected $guarded = [
    ];
}
