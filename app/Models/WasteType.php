<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteType extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi default
    protected $table = 'waste_types';

    // Tentukan kolom yang bisa diisi
    protected $fillable = ['type_name'];
}
