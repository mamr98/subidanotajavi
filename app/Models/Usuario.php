<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use Notifiable, HasFactory, SoftDeletes;

    protected $table = "usuario"; // Asegúrate de que coincide con tu base de datos

    protected $fillable = [
        'email',
        'password',
        'estado',
        'idSede',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function sede(){
        return $this->belongsTo(Sede::class,'idSede','id');
    }

    public function muestras(){
        return $this->hasMany(Muestra::class,'idUsuario','id');
    }
}
