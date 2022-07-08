<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TesteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
                'name' => $this->faker->name(),
                'description' => $this->faker->text(),
                'quantity' => $this->faker->numberBetween($min = 2, $max = 250),
                'price' => $this->faker->numberBetween($min = 15, $max = 9000),
                'end-price'=>$this->faker->numberBetween($min = 50, $max = 9000),
                'foto'=>$this->faker->image()
                
            
        ];
    }
}
