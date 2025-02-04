<?php

namespace App\Models;

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
    use HasFactory;
}
