<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Relacion n:m (pivote) con comandas
    public function comandas() {
        return $this->belongsToMany("\App\Models\Comanda");
    }
}
