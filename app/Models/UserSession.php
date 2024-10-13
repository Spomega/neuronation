<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserSession extends Model
{
    use HasFactory;

    protected $table = 'user_sessions';

    protected $fillable = ['user_id', 'total_score', 'session_date'];

    /**
     * Summary of getSessionHistory
     * @param mixed $userId
     * @return array
     */
    public static function getSessionHistory($userId): array
    {

        $connection = DB::getDriverName();

        if ($connection === 'sqlite') { // this check is for unit tests to run using SQLite
            // SQLite version (no UNIX_TIMESTAMP function)
            return DB::select(
                'SELECT total_score AS score,
                          strftime("%s", session_date) AS date
                   FROM user_sessions
                   WHERE user_id = ?
                   ORDER BY session_date DESC
                   LIMIT 12',
                [$userId]
            );
        }

        return DB::select(
            'SELECT total_score AS score, UNIX_TIMESTAMP(session_date) AS date
             FROM user_sessions
             WHERE user_id = ?
             ORDER BY session_date DESC
             LIMIT 12',
            [$userId]
        );
    }

    public static function getCategoriesForLastSession(int $userId): array
    {
        return DB::select(
            'SELECT DISTINCT c.name
             FROM user_sessions s
             JOIN session_exercises es ON s.id = es.session_id
             JOIN exercises e ON es.exercise_id = e.id
             JOIN categories c ON e.category_id = c.id
             WHERE s.id = (
                SELECT us.id
                FROM user_sessions us
                JOIN session_exercises ex ON us.id = ex.session_id
                JOIN exercises e ON e.id = ex.exercise_id
                WHERE us.user_id = ?
                ORDER BY us.session_date DESC
                LIMIT 1
                )',
            [$userId]
        );
    }
}
