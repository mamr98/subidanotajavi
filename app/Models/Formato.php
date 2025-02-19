<?php

namespace App\Models;

use App\Models\Muestra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formato extends Model
{
    protected $table = "formato";

    protected $fillable = [
        'codigo',
        'nombre',
    ];

    public function muestras(){
        return $this->hasMany(Muestra::class,'idFormato','id');
    }
    use HasFactory;
}
