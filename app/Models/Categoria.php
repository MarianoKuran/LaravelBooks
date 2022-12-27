<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libro;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'lib_categoria';
    protected $primaryKey = 'cod_categoria';
    protected $fillable = ['descripcion'];

    public function libros(){
        return $this->belongsToMany(Libro::class, 'lib_asignar_categoria', 'cod_categoria', 'cod_libro');
    }

    public $timestamps = false;

}
