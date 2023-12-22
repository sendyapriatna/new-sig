<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygon extends Model
{
    protected $table = "polygon_tables";
    protected $fillable = [
        'id',
        'polygon',
        'tipe',
        'is_active'
    ];
    use HasFactory;
}
