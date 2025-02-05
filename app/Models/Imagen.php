<?php

namespace App\Models;

use App\Models\Muestra;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "imagen";

    protected $fillable = [
        'ruta',
        'zoom',
        'idMuestras',
    ];

    public function muestras(){
        return $this->belongsTo(Muestra::class,'idMuestras','id');
    }
    use HasFactory;
}
