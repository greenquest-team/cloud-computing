<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizAnswer extends Model
{
    /** @use HasFactory<\Database\Factories\UserQuizAnswerFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'selected_answer',
        'is_correct',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
