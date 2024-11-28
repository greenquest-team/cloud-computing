<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /** @use HasFactory<\Database\Factories\MaterialFactory> */
    use HasFactory;

    protected $fillable = [
        'waste_types_id',
        'description_mat',
    ];

    public function wasteType()
    {
        return $this->belongsTo(WasteType::class, 'waste_types_id');
    }
}
