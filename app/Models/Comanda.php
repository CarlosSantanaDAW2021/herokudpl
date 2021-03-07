<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;

    // Relacion n:m (pivote) con productos
    public function productos() {
        return $this->belongsToMany("\App\Models\Producto");
    }
}
