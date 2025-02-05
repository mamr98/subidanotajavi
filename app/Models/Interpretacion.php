<?php

namespace App\Models;

use App\Models\TipoEstudio;
use App\Models\Interpretacion;
use Illuminate\Database\Eloquent\Model;

class Interpretacion extends Model
{
    protected $table = "interpretacion";

    protected $fillable = [
        'texto',
        'idTipoEstudio',
    ];

    public function muestra_interpretacion(){
        return $this->belongsTo(Muestras_Interpretacion::class,'idInterpretacion','id');
    }

    public function tipoEstudio(){
        return $this->belongsTo(TipoEstudio::class,'idTipoEstudio','id');
    }

}
