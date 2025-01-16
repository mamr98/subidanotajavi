<?php

namespace App\Models;

use App\Models\Muestra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tipo extends Model
{
    
    protected $table = "tipo";

    protected $fillable = [
        'codigo',
        'nombre',
    ];

    public function muestras(){
        return $this->hasMany(Muestra::class,'idTipo','id');
    }
    use HasFactory;

}
