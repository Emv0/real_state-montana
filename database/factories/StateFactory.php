<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\state>
 */
class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'tipoInmueble'=>$this->faker->randomElement(['casa','apartamento','local','almacen']),
            'zona'=>$this->faker->randomElement(['belen','poblado','bello','envigado']),
            'descripcion'=>$this->faker->paragraph(),
            'direccion'=>$this->faker->address(),
            'imagenInmueble'=>$this->faker->imageUrl()        
        
        ];
    }
}
