<?php

namespace App\Models;

use App\Models\Calidad;
use App\Models\Interpretacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoEstudio extends Model
{
    use HasFactory;


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
