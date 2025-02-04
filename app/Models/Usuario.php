<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    protected $table ="usuario";

    protected $fillable = [
        'email',
        'password',
        'rol',
        'estado',
        'idSede',
    ];

    public function sede(){
        return $this->belongsTo(Sede::class,'idSede','id');
    }
    use HasFactory;
}
