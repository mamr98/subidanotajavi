<?php

namespace App\Models;

use App\Models\Calidad;
use App\Models\Interpretacion;
use Illuminate\Database\Eloquent\Model;

class TipoEstudio extends Model
{
    protected $table = "tipo_estudio";

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function interpretacion(){
        return $this->hasMany(Interpretacion::class,'idTipoEstudio','id');
    }

    public function calidad(){
        return $this->hasMany(Calidad::class,'idTipoEstudio','id');
    }
}
