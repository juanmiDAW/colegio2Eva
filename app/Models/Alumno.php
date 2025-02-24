<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;
    use SoftDeletes; //se agregra eso para que se rellene el campo de deleted_at de la tabla.

    protected $fillable = ['nombre'];

    public function notas(){
        return $this->hasMany(Nota::class);
    }
}
