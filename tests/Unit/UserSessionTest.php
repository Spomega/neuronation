<?php

namespace Tests\Unit;

use App\Models\UserSession;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Models\Exercise;
use App\Models\SessionExercise;
use App\Models\Course;

class UserSessionTest extends TestCase
{
    use RefreshDatabase;

    public function testGetSessionHistory()
    {
        $user = User::factory()->create();

        UserSession::factory()->create(['user_id' => $user->id, 'total_score' => 85, 'session_date' => Carbon::now()->subDays(1)]);
        UserSession::factory()->create(['user_id' => $user->id, 'total_score' => 90, 'session_date' => Carbon::now()->subDays(2)]);


        $history = UserSession::getSessionHistory($user->id);

        $this->assertCount(2, $history);
        $this->assertEquals(85, $history[0]->score);
        $this->assertEquals(90, $history[1]->score);
    }

    /**
     * Test getCategoriesForLastSession method using factories.
     */
    public function testGetCategoriesForLastSession()
    {

        $user = User::factory()->create(['name' => 'John Doe', 'email' => 'john@example.com']);


        $category = Category::factory()->create(['name' => 'Memory']);

        $course = Course::factory()->create(['name' => 'Brain Training']);


        $exercise = Exercise::factory()->create(['name' => 'Memory Test', 'category_id' => $category->id, 'course_id' => $course->id]);


        $session = UserSession::factory()->create([
            'user_id'      => $user->id,
            'total_score'  => 85,
            'session_date' => Carbon::now(),
        ]);


        SessionExercise::factory()->create([
            'session_id'  => $session->id,
            'exercise_id' => $exercise->id,
            'score'       => 50,
        ]);


        $categories = UserSession::getCategoriesForLastSession($user->id);

        $this->assertEquals('Memory', $categories[0]->name);
    }
}
