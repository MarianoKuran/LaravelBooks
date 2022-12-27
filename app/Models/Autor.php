<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sexo;
use App\Models\Libro;

class Autor extends Model
{
    
    use HasFactory;
    protected $table = 'lib_autor';
    protected $primaryKey = 'cod_autor';
    protected $fillable = ['nombres', 'apellidos', 'nombre_completo', 'cod_sexo'];

    public function sexo(){
        return $this->belongsTo(Sexo::class, 'cod_sexo', 'cod_sexo');
    }

    public function libros(){
        return $this->belongsToMany(Libro::class, 'lib_asignar_autor', 'cod_autor', 'cod_libro');
    }
    
    public $timestamps = false;
}
