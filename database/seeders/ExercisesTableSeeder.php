<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exercises')->insert([
            [
                'course_id' => 1,
                'category_id' => 1,
                'name' => 'Flash Memo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 2,
                'category_id' => 2,
                'name' => 'Form Fusion',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 3,
                'category_id' => 1,
                'name' => 'Mathrobatics',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 1,
                'category_id' => 4,
                'name' => 'Verbal Voyager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 2,
                'category_id' => 1,
                'name' => 'Chain Reaction',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 3,
                'category_id' => 5,
                'name' => 'Wordsmith',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 3,
                'category_id' => 5,
                'name' => 'Clockwise',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 3,
                'category_id' => 2,
                'name' => 'Rotator',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
