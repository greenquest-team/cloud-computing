<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuest extends Model
{
    /** @use HasFactory<\Database\Factories\UserQuestFactory> */
    use HasFactory;

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke Quest.
     */
    public function quest()
    {
        return $this->belongsTo(Quest::class, 'quest_id');
    }
}
