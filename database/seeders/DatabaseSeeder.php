<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('productos')->delete(); // Eliminamos la tabla productos
        Producto::factory()->count(50)->create(); // La recreamos con 50 productos test
    }
}
