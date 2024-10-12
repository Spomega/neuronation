<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('session_exercises', function (Blueprint $table) {
                $table->unsignedBigInteger('session_id');
                $table->unsignedBigInteger('exercise_id');
                $table->integer('score');
                $table->timestamp('created_at');
    
                $table->foreign('session_id')->references('id')->on('user_sessions')->onDelete('cascade');
                $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
    
                $table->index('session_id');
                $table->index('exercise_id');

                $table->primary(['session_id', 'exercise_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_exercises');
    }
};
