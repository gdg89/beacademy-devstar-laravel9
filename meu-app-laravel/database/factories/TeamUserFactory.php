<?php

namespace Database\Factories;
use App\Models\TeamUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamUser>
 */
class TeamUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween($min = 1, $max = 22),
            'teams_id'=>$this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
