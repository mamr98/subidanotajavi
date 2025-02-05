<?php

namespace App\Models;

use App\Models\Muestra;
use App\Models\TipoEstudio;
use Illuminate\Database\Eloquent\Model;

class Calidad extends Model
{
    protected $table = "calidad";

    protected $fillable = [
        'nombre',
        'idTipoEstudio',
    ];

    public function muestras(){
        return $this->hasMany(Muestra::class,'idCalidad','id');
    }

    public function tipoEstudio(){
        return $this->belongsTo(TipoEstudio::class,'idTipoEstudio','id');
    }

    use HasFactory;
}
