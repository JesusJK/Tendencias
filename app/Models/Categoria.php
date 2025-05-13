<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  use HasFactory;

  protected $table = 'categorias';
  protected $primaryKey = 'id';

  protected $fillable = [
  'nombre',
  'codigoClasificacion',
  'descripcion',
  'estado',
  'registradoPor',
  ];

  public function materiales()
  {
    return $this ->hasMany(Material::class, 'categoria_id');
  }
}
