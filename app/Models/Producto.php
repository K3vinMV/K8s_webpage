<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'destacado',
        'stock',
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_producto');
    }
}