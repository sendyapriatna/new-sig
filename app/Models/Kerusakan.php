<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $table = "kerusakan_tables";
    protected $fillable = [
        'id',
        'polygon',
        'name',
        'density',
        'is_active'
    ];
}
