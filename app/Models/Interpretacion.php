<?php

namespace App\Models;

use App\Models\TipoEstudio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    public function tipo_estudio(){
        return $this->belongsTo(TipoEstudio::class,'idTipoEstudio','id');
    }
    use HasFactory;
}
