<?php

namespace App\Models;

use App\Models\TipoEstudio;
use App\Models\Interpretacion;
use App\Models\MuestrasInterpretacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interpretacion extends Model
{
    protected $table = "interpretacion";

    protected $fillable = [
        'texto',
        'idTipoEstudio',
    ];

    public function muestra_interpretacion(){
        return $this->belongsTo(MuestrasInterpretacion::class,'idInterpretacion','id');
    }

    public function tipo_estudio(){
        return $this->belongsTo(TipoEstudio::class,'idTipoEstudio','id');
    }
    use HasFactory;
}
