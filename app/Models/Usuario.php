<?php

namespace App\Models;

use App\Models\Muestra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    protected $table ="usuario";

    protected $fillable = [
        'email',
        'password',
        'estado',
        /* 'image', */
        'idSede',
    ];

    public function sede(){
        return $this->belongsTo(Sede::class,'idSede','id');
    }

    public function muestras(){
        return $this->hasMany(Muestra::class,'idUsuario','id');
    }
    use HasFactory, SoftDeletes; 
    //use HasRoles;
}
