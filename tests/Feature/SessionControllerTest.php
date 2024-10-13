<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserSession;
use Carbon\Carbon;

class SessionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the getHistory API endpoint.
     */
    public function testGetHistory()
    {
       # $user = User::factory()->create(['name' => 'John Doe', 'email' => 'john@example.com']);

        UserSession::factory()->create([
            'user_id' => 1,
            'total_score' => 85,
            'session_date' => Carbon::now()->subDays(1),
        ]);

        UserSession::factory()->create([
            'user_id' => 1,
            'total_score' => 90,
            'session_date' => Carbon::now()->subDays(2),
        ]);

        dump(UserSession::all());

        // Act: Call the endpoint
        $response = $this->getJson('/api/users/1/sessions/history');

        // Assert: Check the response
        $response->assertStatus(200)
                 ->assertJsonCount(2, 'history')
                 ->assertJson([
                     'history' => [
                         ['score' => 85],
                         ['score' => 90]
                     ]
                 ]);
    }

}
