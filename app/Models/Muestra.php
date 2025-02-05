<?php

namespace App\Models;

use App\Models\Sede;
use App\Models\Tipo;
use App\Models\Imagen;
use App\Models\Calidad;
use App\Models\Formato;
use App\Models\Usuario;
use App\Models\Interpretacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Muestra extends Model
{
    protected $table = 'muestras';

    protected $fillable = [
        'fecha',
        'codigo',
        'organo',
        'idTipo',
        'idFormato',
        'idCalidad',
        'idUsuario',
        'idSede',
    ];

    public function tipo(){
        return $this->belongsTo(Tipo::class,'idTipo','id');
    }

    public function formato(){
        return $this->belongsTo(Formato::class,'idFormato','id');
    }

    public function calidad(){
        return $this->belongsTo(Calidad::class,'idCalidad','id');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class,'idUsuario','id');
    }

    public function sede(){
        return $this->belongsTo(Sede::class,'idSede','id');
    }

    public function imagen(){
        return $this->hasMany(Imagen::class,'idImagen','id');
    }

    public function muestra_interpretacion(){
        return $this->belongsTo(Muestras_Interpretacion::class,'idMuestras','id');
    }
    use HasFactory;
}
