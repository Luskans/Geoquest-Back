<?php

namespace Database\Factories;

use App\Models\Riddle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameScore>
 */
class GameScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'riddle_id' => Riddle::factory(),
            'player_id' => User::factory(),
            'score'     => fake()->numberBetween(0, 500),
        ];
    }
}
