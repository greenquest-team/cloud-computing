<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    /** @use HasFactory<\Database\Factories\QuestFactory> */
    use HasFactory;

    protected $fillable = [
        'waste_types_id',
        'description_quest',
        'quest_type',
    ];

    /**
     * Define relationship with WasteType.
     * Assuming you have a waste_types table and model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wasteType()
    {
        return $this->belongsTo(WasteType::class, 'waste_types_id');
    }
}
