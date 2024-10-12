<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SessionExercise;
use App\Models\Exercise;
use App\Models\UserSession;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SessionExercise>
 */
class SessionExerciseFactory extends Factory
{
    protected $model = SessionExercise::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'session_id' => UserSession::factory(),
            'exercise_id' => Exercise::factory(),
            'score' => $this->faker->numberBetween(0, 100),
            'created_at' => now(),
        ];
    }
    
}
