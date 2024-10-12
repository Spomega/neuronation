<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionExercise extends Model
{
    use HasFactory;

    protected $table = 'session_exercises';

    protected $fillable = ['session_id', 'exercise_id', 'score', 'created_at'];

    public function session()
    {
        return $this->belongsTo(UserSession::class);
    }

   
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
