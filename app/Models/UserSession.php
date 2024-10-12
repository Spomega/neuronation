<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserSession extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'total_score', 'session_date'];

    /**
     * Summary of getSessionHistory
     * @param mixed $userId
     * @return array
     */
    public static function getSessionHistory($userId) : array
    {
        return DB::select(
            'SELECT total_score AS score, UNIX_TIMESTAMP(session_date) AS date
             FROM sessions
             WHERE user_id = ?
             ORDER BY session_date DESC
             LIMIT 12',
            [$userId]
        );
    }

    public static function getCategoriesForLastSession(int $userId)
    {
        return DB::select(
            'SELECT DISTINCT c.name,s.session_date
             FROM user_sessions s
             JOIN session_exercises es ON s.id = es.session_id
             JOIN exercises e ON es.exercise_id = e.id
             JOIN categories c ON e.category_id = c.id
             WHERE s.user_id = 1
             ORDER BY s.session_date DESC
             LIMIT 1
             )',
            [$userId]
        );
    }

}
