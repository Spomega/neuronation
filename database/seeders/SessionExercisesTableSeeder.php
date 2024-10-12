<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SessionExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('session_exercises')->insert([
            // Session 1 for user 1
            ['session_id' => 1, 'exercise_id' => 1, 'score' => 50, 'created_at' => Carbon::now()],
            ['session_id' => 1, 'exercise_id' => 2, 'score' => 30, 'created_at' => Carbon::now()],
            
            // Session 2 for user 1
            ['session_id' => 2, 'exercise_id' => 3, 'score' => 60, 'created_at' => Carbon::now()],
            ['session_id' => 2, 'exercise_id' => 4, 'score' => 25, 'created_at' => Carbon::now()],

            // Session 3 for user 1
            ['session_id' => 3, 'exercise_id' => 2, 'score' => 45, 'created_at' => Carbon::now()],
            ['session_id' => 3, 'exercise_id' => 3, 'score' => 33, 'created_at' => Carbon::now()],

            // Session 4 for user 1
            ['session_id' => 4, 'exercise_id' => 1, 'score' => 50, 'created_at' => Carbon::now()],
            ['session_id' => 4, 'exercise_id' => 4, 'score' => 42, 'created_at' => Carbon::now()],

            // Session 5 for user 1
            ['session_id' => 5, 'exercise_id' => 2, 'score' => 49, 'created_at' => Carbon::now()],
            ['session_id' => 5, 'exercise_id' => 3, 'score' => 46, 'created_at' => Carbon::now()],

            // Sessions for user 2 (similar combinations)
            ['session_id' => 14, 'exercise_id' => 3, 'score' => 50, 'created_at' => Carbon::now()],
            ['session_id' => 14, 'exercise_id' => 4, 'score' => 27, 'created_at' => Carbon::now()],
            ['session_id' => 15, 'exercise_id' => 1, 'score' => 58, 'created_at' => Carbon::now()],
            ['session_id' => 15, 'exercise_id' => 2, 'score' => 23, 'created_at' => Carbon::now()],
            ['session_id' => 16, 'exercise_id' => 3, 'score' => 60, 'created_at' => Carbon::now()],
            ['session_id' => 16, 'exercise_id' => 4, 'score' => 29, 'created_at' => Carbon::now()],
        ]);
    }
}
