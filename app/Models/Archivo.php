<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'archivo', 
        'sugerencia_id', 
    ];

    public function sugerencia()
    {
        return $this->belongsTo(Sugerencia::class);
    }
}
