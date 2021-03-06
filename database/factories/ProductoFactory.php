<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

// Crea 50 productos para testear la página principal
class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
         'nombre'=>$this->faker->Name,
         'precio'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 30),
         'imagen'=> url("/storage/test.png"), // Asignamos una imagen test.png a todos los productos
         'descripcion'=>$this->faker->text
        ];
    }
}
