<?php

namespace Database\Factories;

use App\Models\Exercise;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    protected $model = Exercise::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'category_id' => Category::factory(),
            'course_id' => Course::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
