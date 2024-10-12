<?php

namespace Database\Factories;

use App\Models\UserSession;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSession>
 */
class UserSessionFactory extends Factory
{
    protected $model = UserSession::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), 
            'total_score' => $this->faker->numberBetween(50, 100),
            'session_date' => Carbon::now()->subDays(rand(1, 12)), // Random date within the last 12 days
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
