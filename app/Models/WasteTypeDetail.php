<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteTypeDetail extends Model
{
    /** @use HasFactory<\Database\Factories\WasteTypeDetailFactory> */
    use HasFactory;

    protected $table = 'waste_type_details';
    protected $fillable = ['waste_types_id', 'description', 'craft'];
}
