<?php

namespace App\Models;

use App\Models\Muestra;
use App\Models\TipoEstudio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Calidad extends Model
{
    protected $table = "calidad";

    protected $fillable = [
        'nombre',
        'descripcion',
        'idTipoEstudio',
    ];

    public function muestras(){
        return $this->hasMany(Muestra::class,'idCalidad','id');
    }

    public function tipo_estudio(){
        return $this->belongsTo(TipoEstudio::class,'idTipoEstudio','id');
    }

    use HasFactory;
}
