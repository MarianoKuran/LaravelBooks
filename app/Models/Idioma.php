<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libro;

class Idioma extends Model
{
    use HasFactory;
    protected $table = 'lib_idioma';
    protected $primaryKey = 'cod_idioma';
    protected $fillable = ['descripcion'];

    public function libros(){
        return $this->hasMany(Libro::class, 'cod_libro', 'cod_libro');
    }

    public $timestamps = false;

}
