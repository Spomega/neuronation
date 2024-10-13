<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $table    = 'exercises';
    protected $fillable = ['name', 'course_id', 'category_id'];

    /**
     * Relationship: An exercise belongs to one course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Relationship: An exercise belongs to one category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship: An exercise belongs to many sessions through the session_exercises table.
     */
    public function sessions()
    {
        return $this->belongsToMany(UserSession::class, 'session_exercises')->withPivot('score', 'created_at');
    }
}
