<?php

namespace App\Models;

use App\Models\Muestra;
use App\Models\Interpretacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MuestrasInterpretacion extends Model
{
    use HasFactory;

    protected $table = "muestras_interpretacion";

    protected $fillable = [
        'calidad',
        'idMuestras',
        'idInterpretacion',
    ];
    public function muestra(){
        return $this->belongsTo(Muestra::class,'idMuestras','id');
    }

    public function interpretacion(){
        return $this->belongsTo(Interpretacion::class,'idInterpretacion','id');
    }
}
