<?php

namespace App\Models;

use App\Models\Muestra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sede extends Model
{
    protected $table = 'sede';

    protected $fillable = [
        'nombre',
        'codigo',
    ];

    public function usuario(){
        return $this->hasMany(Usuario::class,'idSede','id');
    }
    public function muestras(){
        return $this->hasMany(Muestra::class,'idSede','id');
    }
    use HasFactory;
}
