<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'propertiesType'=>$this->faker->randomElement(['Casa','Apartamento','Local','Almacén']),
            'zone'=>$this->faker->randomElement(['Belén','Poblado','Bello','Envigado']),
            'description'=>$this->faker->paragraph(),
            'address'=>$this->faker->address(),
            'propertyImage'=>$this->faker->imageUrl(),   
        ];
    }
    
}
